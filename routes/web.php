<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\AdminController;
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


Route::get('register'  ,'studentController@create')->name('register');
Route::post('sotre'    ,'studentController@store')->name('store');
Route::get('info'      ,'studentController@index')->name('index')->middleware('checklogin');
Route::get('edit/{id}' ,'studentController@edit')->name('edit')->middleware('checklogin');
Route::post('update'   ,'studentController@update')->name('update')->middleware('checklogin');
Route::get('delete/{id}','studentController@delete')->name('delete')->middleware('checklogin');
Route::get('login'      ,'studentController@login')->name('login');
Route::post('dologin'  ,'studentController@dologin')->name('dologin');
Route::get('logout'    ,'studentController@logout')->name('logout')->middleware('checklogin');


 




 
Route::resource('admins','AdminController');


/*
admins         (get) Route::get('admins','AdminController@index');
admins/create  (get) Route::get('admins/create','AdminController@create');
admins         (post) Route::post('admins','AdminController@store');
admins/{id}/edit (get) Route::get('admins/{id}/edit','AdminController@edit');
admins/{id}         (put) Route::post('admins/{id}','AdminController@update');
admins/{id}       (get) Route::get('admins/{id}','AdminController@show');
admins/{id}         (delete) Route::delete('admins/{id}','AdminController@destroy');

*/ 

Route::get('adminlogin'      ,'AdminController@login');
Route::post('admindologin'  ,'AdminController@dologin');
 Route::get('adminlogout'    ,'AdminController@logout')->middleware('AdminCheck');
