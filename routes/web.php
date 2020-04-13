<?php

use Illuminate\Support\Facades\Route;
use App\Notifications\DatabaseNotification;
use App\User;
use Illuminate\Support\Facades\Notification;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('profile', function () {
    return "Sahi ja rhe ho bhai :)";
})->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/sendMail','MailController@index');
Route::get('/notify' , function(){
        $users = User::all();
        $letter = collect(['title' => 'New Policy Update', 'body' => 'We have updated our TDS and Privacy Policy, Kindly Read it!' ]);
        Notification::send($users, new DatabaseNotification($letter));
        echo "Notification send to all Users";
});

Route::get('markasread', function() {
        \Auth::user()->notifications->markAsRead();
        return redirect()->back();
})->name('markAsRead');

Route::get('markasUnread', function() {
    \Auth::user()->notifications->markAsUnRead();
    return redirect()->back();
})->name('markAsUnRead');