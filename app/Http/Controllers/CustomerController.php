<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use DB;
use Exception;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{
    public function AddCustomer(Request $request)
    {

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'Guaranteed_person' => 'required',
            'phone_number' => 'required',
            'complete_address' => 'required',
        ]);



        $Customer = new Customer();
        $Customer->name = $request->customer_name;
        $Customer->guaranteed_person = $request->Guaranteed_person;
        $Customer->phone = $request->phone_number;
        $Customer->address = $request->complete_address;
        $Customer->debt_amount = $request->debpt_amount;
        $Customer->discount = $request->meta_title;
        $Customer->fat_rate = $request->fat_rate;
        $Customer->waste_rate = $request->waste_rate;
        $Customer->status = $request->status;
        if($request->has('avatar'))
        {
        $Customer->image = $this->sendimagetodirectory($request->file('avatar'));
        }
        $Customer->save();
        return redirect()->back()->with('success', 'Customer Added successfully');

    }

    public function AllCustomer()
    {
        $Customers = Customer::get();
        return view('modules.customers.index',compact('Customers'));
    }

    public static function sendimagetodirectory($imagename)
    {

        $file = $imagename;

        $filename = rand() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('assets/customer'), $filename);

        return $filename;

    }
}
