<?php

namespace App\Http\Controllers;

use App\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;

class ForgotPasswordController extends Controller
{

    public function forgottenPassword(Request $request){
        $validate = $request->validate([
            'email' => 'required|email'
        ]);
        //echo $request->email;
        $user = User::where('email', request()->input('email'))->first();

        if ($user){
            if ($user->count() > 1){
                $token = Password::getRepository()->create($user);
                $user->sendPasswordResetNotification($token);
//                Mail::send(['text' => 'emails.password'], ['token' => $token], function (Message $message) use ($user) {
//                    $message->subject(config('app.name') . ' Password Reset Link');
//                    $message->to($user->email);
//                });
//                Mail::send('emails.password', ['user' => $user], function ($m) use ($user) {
//                    $m->from('faithdinno@gmail.com', 'Engr.Faith');
//
//                    $m->to($user->email, $user->name)->subject(config('app.name') . ' Password Reset Link');
//                });
                Mail::send(['text' => 'emails.password'], ['token' => $token], function (Message $message) use ($user) {
                    $message->to($user->email)->subject(config('app.name') . ' Password Reset Link');
                });
                return Redirect::back()->with('success', 'Link has been sent to your Mail');
            }
        }else{
            return Redirect::back()->with('error', 'User does not exist');
        }
//        return Redirect::back();
    }
}
