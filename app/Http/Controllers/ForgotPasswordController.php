<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use phpseclib\Crypt\Hash;

class ForgotPasswordController extends Controller
{

//    public function forgottenPassword(Request $request){
//        $validate = $request->validate([
//            'email' => 'required|email'
//        ]);
//        //echo $request->email;
//        $user = User::where('email', request()->input('email'))->first();
//
//        if ($user){
//            if ($user->count() > 1){
//                $token = Password::getRepository()->create($user);
//                $user->sendPasswordResetNotification($token);
////                Mail::send(['text' => 'emails.password'], ['token' => $token], function (Message $message) use ($user) {
////                    $message->subject(config('app.name') . ' Password Reset Link');
////                    $message->to($user->email);
////                });
////                Mail::send('emails.password', ['user' => $user], function ($m) use ($user) {
////                    $m->from('faithdinno@gmail.com', 'Engr.Faith');
////
////                    $m->to($user->email, $user->name)->subject(config('app.name') . ' Password Reset Link');
////                });
//                Mail::send(['text' => 'emails.password'], ['token' => $token], function (Message $message) use ($user) {
//                    $message->to($user->email)->subject(config('app.name') . ' Password Reset Link');
//                });
//                return Redirect::back()->with('success', 'Link has been sent to your Mail');
//            }
//        }else{
//            return Redirect::back()->with('error', 'User does not exist');
//        }
////        return Redirect::back();
//    }
//    public function ValidatePasswordRequest(Request $request)
//    {
//        $request->validate([
//            'email' => 'required|email'
//        ]);
//        //You can add validation login here
//        $user = DB::table('users')->where('email', '=', $request->email)
//            ->first();
//        //Check if the user exists
//        if (!$user) {
//            //return redirect()->back()->with('success', trans('User exist'));
//            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
//        }
//        $user = DB::table('users')->where('email', $request->email)->select('username', 'email')->first();
//        $token = Str::random(60);
//
//        DB::table('password_resets')->insert([
//            'email' => $request->email,
//            'token' => $token,
//            'created_at' => Carbon::now()
//        ]);
//        //Get the token just created above
//        $tokenData = DB::table('password_resets')
//            ->where('email', $request->email)->first();
//
//        $send = Mail::to($request->email)->send(new ResetPassword($user, $tokenData));
//        if ($send) {
//            return redirect()->back()->with('success', trans('A reset link has been sent to your email address.'));
//        } else {
//            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
//        }
//  }
//    public function resetPassword(Request $request)
//    {
//        return view('reset-password/$token');
////        //Validate input
////        $validator = Validator::make($request->all(), [
////            'email' => 'required|exists:users,email',
////            'password' => 'required|confirmed'
////        ]);
////
////        //check if input is valid before moving on
////        if ($validator->fails()) {
////            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
////        }
////
////        $password = $request->password;
////// Validate the token
////        $tokenData = DB::table('password_resets')
////            ->where('token', $request->token)->first();
////// Redirect the user back to the password reset request form if the token is invalid
////        if (!$tokenData) return view('auth.passwords.email');
////
////        $user = User::where('email', $tokenData->email)->first();
////// Redirect the user back if the email is invalid
////        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
//////Hash and update the new password
////        $user->password = \Hash::make($password);
////        $user->update(); //or $user->save();
////
////        //login the user immediately they change password successfully
////        Auth::login($user);
////
////        //Delete the token
////        DB::table('password_resets')->where('email', $user->email)
////            ->delete();
////
////        //Send Email Reset Success Email
////        if ($this->sendSuccessEmail($tokenData->email)) {
////            return view('index');
////        } else {
////            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
////        }
//
//    }
}
