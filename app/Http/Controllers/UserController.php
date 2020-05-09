<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;


class UserController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth')->except('create');
//    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|min:3|alpha_num|max:15|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:15|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%@&+_*]).*$/',
            'password_confirmation' => 'same:password'
        ]);
        $hash = Hash::make($request->password);
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $hash;
        $user->save();
        if ($user){
            return Redirect::back()->with('success', 'Successfully Registered');
        }else{
            return Redirect::back()->with('error', 'Error Occur');
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|alpha_num|max:15',
            'password' => 'required|min:6|max:15|'
        ]);
    $data = array(
        'username' => $request->username,
        'password' => $request->password
    );
    if (Auth::attempt($data)){
        $user = Auth::User()->username;
        session()->put('username', $user);
        return Redirect::intended('index');
    }else{
        return Redirect::back()->with('error', 'Wrong Username and Password');
    }

    }
    public function logout(Request $request){
        //$request->session()->flush();
        Auth::logout();
        return Redirect::to('login');
    }
    public function read(){
        $user = User::all();
        return view('/read', ['data' => $user]);
    }
}
