<?php

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

Auth::routes();

Route::get('invite', 'InviteController@create')->name('invite');
Route::post('invite', 'InviteController@store')->name('invite.store');
Route::get('register/{invite_token?}', 'InviteController@getInviteByToken')->name('invite.use');

Route::get('/home', 'HomeController@index')->name('home');

//--- Проверка SwitAlert
//Route::get('swal', function () {
//    SWAL::message('Success','SwitAlert2','success',['timer'=>2000]);
//    return redirect()->back();
//})->name('swal');
