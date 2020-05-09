<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('settings/change-password');
    }

    public function change(Request $request)
    {
        $request->validate([
           'current_password' => ['required', new MatchOldPassword],
           'new_password' => 'required|min:8|max:15',
            'confirm_password' => 'same:new_password'
        ]);
        $change = User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        if ($change)
        {
            return Redirect::back()->with('success', 'Password Changed Successfully');
        }else{
            return Redirect::back()->with('error', 'something is wrong');
        }
    }
}
