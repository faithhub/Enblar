<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\DB;

class EmailController extends Controller
{
    public function index()
    {
        return view('email-list/all-email');
    }
    public function DeleteEmail($id)
    {
        $delete = Email::where('id', $id)->delete();
        if ($delete){
            return Redirect::back()->with('success', 'Email Deleted Successfully');
        }else{
            return Redirect::back()->with('error', 'Error Occur');
        }
    }
    public function fetchEmails()
    {
        $fetch = Email::all();

        return view('email-list/all-email')->with(['data' => $fetch]);
    }
    public function addEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:emails'
        ]);
        $email = Email::create($request->all());
        if ($email){
            return Redirect::back()->with('success', 'Email Added Successfully');
        }else{
            return Redirect::back()->with('error', 'Error Occur');
        }
    }
    public function editEmail(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $data = array();
        $data['email'] = $request->email;
        $change = Email::where('id', $id)->update($data);
        if ($change)
        {
            return Redirect::back()->with('success', 'Email Updated Successfully');
        }else{
            return Redirect::back()->with('error', 'something is wrong');
        }
    }
}
