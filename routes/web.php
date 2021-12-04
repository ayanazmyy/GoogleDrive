<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

######## DriveController routes ########

### Display all data
Route::get('drives', 'DriveController@index')->name('drives.index');

### Go to create page
Route::get('drives/create', 'DriveController@create')->name('drives.create');

### To store in database
Route::post('drives/store', 'DriveController@store')->name('drives.store');

### Go to show one item
Route::get('drives/show/{id}', 'DriveController@show')->name('drives.show');

### Go to edit page
Route::get('drives/edit/{id}', 'DriveController@edit')->name('drives.edit');

### To update in database
Route::post('drives/edit/{id}', 'DriveController@update')->name('drives.edit');

### To remove from database
Route::get('drives/remove/{id}', 'DriveController@destroy')->name('drives.destroy');

### To download
Route::get('drives/download/{id}', 'DriveController@download')->name('drives.download');

##### End DriveController #################################
