<?php
namespace App\Http\Controllers;

use App\Models\CashInOut;
use App\Models\Customer;
use App\Models\CustomerDebt;
use App\Models\CustomerSupplies;
use App\Models\FatWaste;
use App\Models\GoshtRate;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class DailySupplyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function DailySupply()
    {
        $Customers = Customer::where('status', 'Active')->get();
        $today     = Carbon::now('Asia/Karachi')->toDateString();
        $rate      = GoshtRate::where('date', $today)->value('rate') ?? 'Not Set';
        return view('modules.daily-supply.index', compact('Customers', 'rate', 'today'));
    }

    public function setDailyRate(Request $request)
    {
        $rate  = $request->input('rate');
        $today = Carbon::now('Asia/Karachi')->toDateString();

        $muttonRate = GoshtRate::where('date', $today)->first();

        if (! $muttonRate) {
            GoshtRate::create([
                'rate'   => $rate,
                'date'   => $today,
                'status' => 1,

            ]);
        } else {
            if ($muttonRate->date === $today) {
                $muttonRate->update(['rate' => $rate]);
            } else {
                GoshtRate::create([
                    'rate'   => $rate,
                    'date'   => $today,
                    'status' => 1,

                ]);
            }
        }

        return response()->json(['success' => 'Daily rate updated successfully']);

    }

    public function setDailySupply(Request $request)
    {
        $request->validate([
            'chicken_supply'  => 'required|numeric|min:0.1',
            'discount_per_kg' => 'nullable|numeric|min:0',
            'customer_id'     => 'required|exists:customers,id',
        ]);

        $chicken_supply  = $request->input('chicken_supply');
        $discount_per_kg = $request->input('discount_per_kg', 0);
        $customer_id     = $request->input('customer_id');

        $today = Carbon::now('Asia/Karachi')->toDateString();

        $rate = GoshtRate::where('date', $today)->value('rate');

        if (! $rate) {
            return response()->json(['error' => 'Mutton rate not set for today']);
        }

        $effective_rate = $rate - $discount_per_kg;
        $total_amount   = $effective_rate * $chicken_supply;

        $total_amount = max($total_amount, 0);

        $muttonRate = CustomerSupplies::where('customer_id', $customer_id)->where('date', $today)->first();

        if (! $muttonRate) {
            CustomerSupplies::create([
                'customer_id'     => $customer_id,
                'chicken_supply'  => $chicken_supply,
                'discount_per_kg' => $discount_per_kg,
                'date'            => $today,
                'status'          => 1,
                'total_amount'    => $total_amount,
            ]);
        } else {
            $muttonRate->update([
                'chicken_supply'  => $chicken_supply,
                'discount_per_kg' => $discount_per_kg,
                'total_amount'    => $total_amount,
            ]);
        }

        return response()->json(['success' => 'Drop Supply updated successfully']);
    }

    public function UpdateDailySupply(Request $request)
    {
        $request->validate([
            'chicken_supply'  => 'required|numeric|min:0.1', // Required and must be a positive number
            'discount_per_kg' => 'nullable|numeric|min:0',   // Optional, must be a non-negative number
        ]);

        $chicken_supply  = $request->input('chicken_supply');
        $discount_per_kg = $request->input('discount_per_kg', 0); // Default to 0 if not provided
        $customer_id     = $request->input('customer_edit_id');

        $today = Carbon::now('Asia/Karachi')->toDateString();

        $rate = GoshtRate::where('date', $today)->value('rate');

        if (! $rate) {
            return response()->json(['error' => 'Mutton rate not set for today'], 400);
        }

        $effective_rate = $rate - $discount_per_kg;
        $total_amount   = $effective_rate * $chicken_supply;

        $total_amount = max($total_amount, 0);

        $muttonRate = CustomerSupplies::where('id', $customer_id)->where('date', $today)->first();

        if ($muttonRate) {
            $muttonRate->update([
                'chicken_supply'  => $chicken_supply,
                'discount_per_kg' => $discount_per_kg,
                'total_amount'    => $total_amount,
            ]);
        }

        return response()->json(['success' => 'Drop Supply updated successfully']);
    }
    public function ReceiveAmount(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric|min:0.1',
        ]);

        $amount      = $request->input('amount', 0);
        $customer_id = $request->input('customer_id');

        $today = Carbon::now('Asia/Karachi')->toDateString();

        $muttonRate = CustomerSupplies::where('customer_id', $customer_id)->where('date', $today)->first();

        if (! $muttonRate) {
            return response()->json(['error' => 'No Data Found'], 400);
        }
        $Customers = CustomerDebt::where('customer_id', $customer_id)->first();

        if ($amount > $muttonRate->total_amount || $amount < 0) {
            return response()->json([
                'error' => 'Invalid amount. The amount should not be greater than the total Bill amount.',
            ], 422);
        }

        $receiveAmount = $muttonRate->total_amount - $amount;
        $Debt          = $receiveAmount + $Customers->total_debt_amount;

        if ($muttonRate) {
            $muttonRate->update([
                'received_amount'      => $amount,
                'difference'           => $receiveAmount,
                'debt'                 => $Debt,
                'previous_debt_amount' => $Customers->total_debt_amount,

            ]);
        }

        DB::table('customer_debt')->where('customer_id', $customer_id)->update(['total_debt_amount' => $Debt]);
        return response()->json(['success' => 'Receive Amount updated successfully']);

    }

    public function UpdateDailySupplyCustomer(Request $request)
    {
        $request->validate([
            'chicken_supply'  => 'required|numeric|min:0.1', // Required and must be a positive number
            'discount_per_kg' => 'nullable|numeric|min:0',   // Optional, must be a non-negative number
        ]);

        $chicken_supply  = $request->input('chicken_supply');
        $discount_per_kg = $request->input('discount_per_kg', 0); // Default to 0 if not provided
        $customer_id     = $request->input('id');

        $GoshtRate = CustomerSupplies::where('id', $customer_id)->first();
        $rate      = GoshtRate::where('date', $GoshtRate->date)->value('rate');

        if (! $rate) {
            return response()->json(['error' => 'Mutton rate not set for today'], 400);
        }

        $effective_rate = $rate - $discount_per_kg;
        $total_amount   = $effective_rate * $chicken_supply;

        $total_amount = max($total_amount, 0);

        $muttonRate = CustomerSupplies::where('id', $customer_id)->first();

        if ($muttonRate) {
            $muttonRate->update([
                'chicken_supply'  => $chicken_supply,
                'discount_per_kg' => $discount_per_kg,
                'total_amount'    => $total_amount,
            ]);
        }

        return response()->json(['success' => 'Drop Supply updated successfully']);
    }

    public function ReceiveAmountEdit(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric|min:0.1',
        ]);

        $amount      = $request->input('amount', 0);
        $customer_id = $request->input('supply_id');

        $muttonRate = CustomerSupplies::where('id', $customer_id)->first();

        if (! $muttonRate) {
            return response()->json(['error' => 'No Data Found'], 400);
        }
        $Customers = CustomerDebt::where('customer_id', $muttonRate->customer_id)->first();

        if ($amount > $muttonRate->total_amount || $amount < 0) {
            return response()->json([
                'error' => 'Invalid amount. The amount should not be greater than the total Bill amount.',
            ], 422);
        }

        $receiveAmount = $muttonRate->total_amount - $amount;
        $Debt          = $receiveAmount + $Customers->total_debt_amount;

        if ($muttonRate) {
            $muttonRate->update([
                'received_amount'      => $amount,
                'difference'           => $receiveAmount,
                'debt'                 => $Debt,
                'previous_debt_amount' => $Customers->total_debt_amount,

            ]);
        }

        DB::table('customer_debt')->where('customer_id', $muttonRate->customer_id)->update(['total_debt_amount' => $Debt]);
        return response()->json(['success' => 'Receive Amount updated successfully']);

    }

    public function AddCheckIn(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric|min:0.1',
            'detail' => 'required',

        ]);

        $amount      = $request->input('amount', 0);
        $customer_id = $request->input('customer_id');

        $Customers = CustomerDebt::where('customer_id', $customer_id)->first();

        $today = Carbon::now('Asia/Karachi')->toDateString();

        if ($amount > $Customers->total_debt_amount || $amount < 0) {
            return response()->json([
                'error' => 'Invalid amount. The amount should not be greater than the total debt or negative.',
            ], 422);
        }
        $checkIn = $Customers->total_debt_amount - $amount;

        $ChekIn                    = new CashInOut();
        $ChekIn->customer_id       = $customer_id;
        $ChekIn->date              = $today;
        $ChekIn->debt_amount       = $Customers->total_debt_amount;
        $ChekIn->cash              = $amount;
        $ChekIn->total_debt_amount = $checkIn;
        $ChekIn->detail            = $request->detail;
        $ChekIn->type              = 'cashin';
        $ChekIn->save();

        DB::table('customer_debt')->where('customer_id', $customer_id)->update(['total_debt_amount' => $checkIn]);

        return response()->json(['success' => 'Check In Added successfully']);

    }

    public function AddCashOut(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric|min:0.1',
            'detail' => 'required',

        ]);

        $amount      = $request->input('amount', 0);
        $customer_id = $request->input('customer_id');

        $Customers = CustomerDebt::where('customer_id', $customer_id)->first();

        $today = Carbon::now('Asia/Karachi')->toDateString();

        $checkIn = $Customers->total_debt_amount + $amount;

        $ChekIn                    = new CashInOut();
        $ChekIn->customer_id       = $customer_id;
        $ChekIn->date              = $today;
        $ChekIn->debt_amount       = $Customers->total_debt_amount;
        $ChekIn->cash              = $amount;
        $ChekIn->total_debt_amount = $checkIn;
        $ChekIn->detail            = $request->detail;
        $ChekIn->type              = 'cashout';
        $ChekIn->save();

        DB::table('customer_debt')->where('customer_id', $customer_id)->update(['total_debt_amount' => $checkIn]);

        return response()->json(['success' => 'Check Out Added successfully']);

    }

    public function AddFat(Request $request)
    {

        $request->validate([
            'fat_waste_kg'   => 'required|numeric|min:0.1',
            'fat_waste_rate' => 'required|numeric|min:0.1',

        ]);

        $amount      = $request->input('fat_waste_rate', 0);
        $supply      = $request->input('fat_waste_kg');
        $customer_id = $request->input('customer_id');

        $today = Carbon::now('Asia/Karachi')->toDateString();

        $total_amount = $amount * $supply;
        $total_amount = max($total_amount, 0);

        $Fat                 = new FatWaste();
        $Fat->customer_id    = $customer_id;
        $Fat->date           = $today;
        $Fat->fat_waste_rate = $amount;
        $Fat->fat_waste_kg   = $supply;
        $Fat->total          = $total_amount;
        $Fat->type           = 'fat';
        $Fat->save();

        return response()->json(['success' => 'Fat Added successfully']);

    }

    public function AddWaste(Request $request)
    {

        $request->validate([
            'fat_waste_kg'   => 'required|numeric|min:0.1',
            'fat_waste_rate' => 'required|numeric|min:0.1',

        ]);

        $amount      = $request->input('fat_waste_rate', 0);
        $supply      = $request->input('fat_waste_kg');
        $customer_id = $request->input('customer_id');

        $today = Carbon::now('Asia/Karachi')->toDateString();

        $total_amount = $amount * $supply;
        $total_amount = max($total_amount, 0);

        $Fat                 = new FatWaste();
        $Fat->customer_id    = $customer_id;
        $Fat->date           = $today;
        $Fat->fat_waste_rate = $amount;
        $Fat->fat_waste_kg   = $supply;
        $Fat->total          = $total_amount;
        $Fat->type           = 'waste';
        $Fat->save();

        return response()->json(['success' => 'waste Added successfully']);

    }

    public static function sendimagetodirectory($imagename)
    {

        $file = $imagename;

        $filename = rand() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('assets/customer'), $filename);

        return $filename;

    }

}
