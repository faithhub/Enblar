<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Middleware\UserAuth;
use Illuminate\Routing\Middleware\AfterLoggedIn;
use Spatie\Analytics\Period;

//use Illuminate\Routing\Middleware\RevalidateBackHistory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::group(  ['middleware'=> 'UserAuth'], function() {
    Route::get('/', function () {
            return view('welcome');
    });
    Route::get('/index', 'UserController@index');
    Route::view('Audience-Overview', 'analytics/Audience-Overview');
    Route::view('Users-Analytics', 'analytics/Users-Analytics');
    Route::view('Website-traffic', 'analytics/Website-traffic');
    Route::get('all-messages', 'MessagesController@allMessages');
    Route::get('message/{id}', 'MessagesController@message');
    Route::get('delete-message/{id}', 'MessagesController@deleteMessage');
    Route::get('all-newsletters', 'NewsletterController@fetchAllNewsletters');
    Route::get('newsletter/{id}', 'NewsletterController@newsletter');
    Route::get('drafts/{id}', 'NewsletterController@newsletter2');
    Route::post('drafts/{id}', 'NewsletterController@sendDraftNewsletter');
    Route::get('deleteNewsletter/{id}', 'NewsletterController@deleteNewsletter');
    Route::view('replied-messages', 'message/replied-messages');
    Route::post('sent-newsletter', 'NewsletterController@sendNewsletter');
    Route::get('draft-newsletter', 'NewsletterController@draftNewsletter');
    Route::get('sent-newsletters', 'NewsletterController@sentNewsletter');
    Route::get('sent-newsletter', 'NewsletterController@fetchEmails');
    Route::view('trash-newsletter', 'newsletter/trash-newsletter');
    Route::get('all-email', 'EmailController@index');
    Route::get('start-cook', 'LockScreenController@startCookie');
    Route::view('lock', 'lock');
    Route::get('all-email', 'EmailController@fetchEmails');
    Route::post('edit-email/{id}', 'EmailController@editEmail');
    Route::get('delete-email/{id}', 'EmailController@DeleteEmail');
    Route::view('add-email', 'email-list/add-email');
    Route::post('add-email', 'EmailController@addEmail')->name('add.email');
    Route::get('all-customer', 'CustomerController@fetchCustomers');
    Route::get('view-customer', 'CustomerController@ViewCustomer');
    Route::get('new-customer', 'CustomerController@newCustomer');
    Route::get('delete-customer/{id}', 'CustomerController@DeleteCustomer');
    Route::get('view-customer/{id}', 'CustomerController@ViewCustomer');
    Route::post('new-customer', 'CustomerController@addCustomer')->name('add.customer');
    Route::post('update-status/{id}', 'CustomerController@CustomerStatus');

    Route::get('change-password', 'ChangePasswordController@index');
    Route::post('change-password', 'ChangePasswordController@change')->name('change.password');
    Route::get('/update-profile', function () {
        return view('settings/update-profile');
    });

    });

    Route::post('register', 'UserController@create')->name('create');
    Route::get('logout', 'UserController@logout');
    Route::get('/register', function () {
        return view('register');
    })->middleware('logged');
    Route::get('/login', function () {
        return view('login');
    })->middleware('logged');
    Route::post('login', 'UserController@login');
//    Route::view('/forgotten-password', 'forgotten-password');
//    Route::get('/reset-password/{$token}', 'ForgotPasswordController@resetPassword')->name('reset-password');
//    Route::get('/reset', function () {
//        return view('auth/passwords/reset');
//    });
//      Route::post('forgotten-password', 'ForgotPasswordController@ValidatePasswordRequest');

//Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');

//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
