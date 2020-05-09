<?php

namespace App\Http\Controllers;

use App\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('customer/all-customer');
    }
    public function newCustomer()
    {
        return view('customer/new-customer');
    }
    public function DeleteCustomer($id)
    {
        $delete = Customer::where('id', $id)->delete();
        if ($delete){
            return Redirect::back()->with('success', 'Customer Deleted Successfully');
        }else{
            return Redirect::back()->with('error', 'Error Occur');
        }
    }
    public function ViewCustomer($id)
    {
        $fetch = Customer::where('id', '=', $id)->first();
        return view('customer/view-customer')->with('data', $fetch);
    }
    public function CustomerStatus(Request $request, $id)
    {
        $data = array();
        $data['status'] = $request->status;
        $fetch = Customer::where('id', $id)->update($data);
        if ($fetch)
        {
            return Redirect::back()->with('success', 'Status Updated Successfully');
        }else{
            return Redirect::back()->with('error', 'Error Occur');
        }
    }
    public function fetchCustomers()
    {
        $fetch = Customer::all();

        return view('customer/all-customer', ['data' => $fetch]);
    }
    public function addCustomer(Request $request)
    {
        $request->validate([
            'full_name' => 'required|min:5|regex:/^[a-zA-Z\s]*$/|max:30',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'project_type' => 'required'
        ]);
        $customer = Customer::create($request->all());
        if ($customer){
            return Redirect::back()->with('success', 'Customer Successfully Registered');
        }else{
            return Redirect::back()->with('error', 'Error Occur');
        }
    }
}
