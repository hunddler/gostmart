<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerDebt;
use Exception;
use Illuminate\Http\Request;
use App\Models\CustomerSupplies;
use App\Models\CashInOut;


class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Customer()
    {
        return view('modules.customers.add');
    }

    public function AddCustomer(Request $request)
    {

        $request->validate([
            'customer_name'     => 'required|string|max:255',
            'Guaranteed_person' => 'required',
            'phone_number'      => 'required',
            'complete_address'  => 'required',
        ]);

        $Customer                    = new Customer();
        $Customer->name              = $request->customer_name;
        $Customer->guaranteed_person = $request->Guaranteed_person;
        $Customer->phone             = $request->phone_number;
        $Customer->address           = $request->complete_address;
        $Customer->debt_amount       = $request->debpt_amount;
        $Customer->discount          = $request->meta_title;
        $Customer->fat_rate          = $request->fat_rate;
        $Customer->waste_rate        = $request->waste_rate;
        $Customer->status            = $request->status;
        if ($request->has('avatar')) {
            $Customer->image = $this->sendimagetodirectory($request->file('avatar'));
        }
        $Customer->save();

        CustomerDebt::create([
            'customer_id'     => $Customer->id,
            'total_debt_amount'  => $Customer->debt_amount,
        ]);
        return redirect()->back()->with('success', 'Customer Added successfully');

    }

    public function UpdateCustomer(Request $request)
    {

        $request->validate([
            'customer_name'     => 'required|string|max:255',
            'Guaranteed_person' => 'required',
            'phone_number'      => 'required',
            'complete_address'  => 'required',
        ]);

        $Customer                    = Customer::find($request->id);
        $Customer->name              = $request->customer_name;
        $Customer->guaranteed_person = $request->Guaranteed_person;
        $Customer->phone             = $request->phone_number;
        $Customer->address           = $request->complete_address;
        $Customer->debt_amount       = $request->debpt_amount;
        $Customer->discount          = $request->meta_title;
        $Customer->fat_rate          = $request->fat_rate;
        $Customer->waste_rate        = $request->waste_rate;
        $Customer->status            = $request->status;
        if ($request->has('avatar')) {
            $Customer->image = $this->sendimagetodirectory($request->file('avatar'));
        }
        $Customer->save();
        return redirect()->to('/customers')->with('success', 'Customer Updated successfully');

    }

    public function AllCustomer()
    {
        $Customers = Customer::get();
        return view('modules.customers.index', compact('Customers'));
    }

    public function EditCustomer($id)
    {
        $EditCustomer = Customer::find($id);
        return view('modules.customers.detail.edit', compact('EditCustomer'));
    }

    public function CustomerDetail($id)
    {
        $CustomerDetail = Customer::find($id);
        $CustomerDebt = CustomerDebt::where('customer_id',$id)->first();
        $Customersupply = CustomerSupplies::where('customer_id',$id)->get();
        return view('modules.customers.detail.index', compact('CustomerDetail','Customersupply','CustomerDebt'));
    }

    public function DeleteCustomerBulk(Request $request)
    {

        try {

            $Customer = Customer::whereIn('id', $request->selectedOptions)->delete();
            return response()->json(['success' => 'Customer deleted successfully.']);

        } catch (Exception $e) {

            return response()->json(['errors' => $e->getMessage()], 500);

        }

    }

    public function UpdateCustomeStatus($id)
    {
        try {
            $Customer = Customer::find($id);

            if (! $Customer) {
                return redirect()->back()->with('error', 'Customer not found');
            }

            switch ($Customer->status) {
                case 'Active':
                    $Customer->status = 'In-Active';
                    break;
                case 'In-Active':
                    $Customer->status = 'Archived';
                    break;
                case 'Archived':
                    $Customer->status = 'Active';
                    break;
                default:
                    $Customer->status = 'Active';
            }

            $Customer->save();

            return redirect()->back()->with('success', 'Customer status updated successfully');

        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function CustomerFilter(Request $request)
    {

        if ($request->value == 'all') {
            $Customers = Customer::get();
        } else {
            $Customers = Customer::where('status', $request->value)->get();
        }
        return view('modules.customers.customer-filter', compact('Customers'));
    }

    public function DeleteCustomer(Request $request)
    {

        try {

            $Customer = Customer::where('id',$request->delete_id)->delete();
            return redirect()->back()->with('success', 'Customer deleted successfully');


        } catch (Exception $e) {

            return redirect()->back()->with('errors', $e->getMessage());


        }

    }

    public function exportAllCustomer(Request $request)
    {

        $Customers = Customer::get();
        $csvData = "Name,Phone #,Debt Amount,Discount/Kg,Fat Rate/Kg,Waste Rate/Kg,Status\n";

        foreach ($Customers as $customer) {
            $csvData .= "{$customer->name},{$customer->phone},{$customer->debt_amount},{$customer->discount},{$customer->fat_rate},{$customer->waste_rate},{$customer->status}\n";
        }

        // Return CSV response
        return response($csvData)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="customer.csv"');
    }

    public function Customersetting($id)
    {
        $CustomerDetail = Customer::find($id);
        $CustomerDebt = CustomerDebt::where('customer_id',$id)->first();
        return view('modules.customers.detail.settings.index', compact('CustomerDetail','CustomerDebt'));
    }

    public function UpdateCustomerSettings(Request $request)
    {

        $request->validate([
            'customer_name'     => 'required|string|max:255',
        ]);

        $Customer                    = Customer::find($request->id);
        $Customer->name              = $request->customer_name;
        $Customer->phone             = $request->phone_number;

        if ($request->has('avatar')) {
            $Customer->image = $this->sendimagetodirectory($request->file('avatar'));
        }
        $Customer->save();
        return redirect()->back()->with('success', 'Customer Settings Updated successfully');

    }

    public function CustomerCash($id)
    {
        $CustomerDetail = Customer::find($id);
        $CustomerDebt = CustomerDebt::where('customer_id',$id)->first();
        $CustomerCash = CashInOut::where('customer_id',$id)->get();
        return view('modules.customers.detail.cash-in-cash-out.index', compact('CustomerDetail','CustomerDebt','CustomerCash'));
    }

    public static function sendimagetodirectory($imagename)
    {

        $file = $imagename;

        $filename = rand() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('assets/customer'), $filename);

        return $filename;

    }
}
