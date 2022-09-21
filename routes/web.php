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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'AuthController@getLogin')->name('login');
    Route::post('/login', 'AuthController@postLogin')->name('login.post');
    
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'AuthController@getLogout')->name('logout');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/get-master', 'DashboardController@getJson')->name('get.master');    


    // User Management
    Route::get('/management-user', 'ManagementUserController@index')->name('management-user.index');  
    Route::get('/management-user/get', 'ManagementUserController@cgJson')->name('user.get');    
    Route::post('/management-user-post', 'ManagementUserController@store')->name('user.post');    

    // Module
    Route::get('/pmmodule', 'ModuleController@index')->name('module.index');  
    Route::get('/pmmodule/get', 'ModuleController@cgJson')->name('module.get');    

    // Log-History
    Route::get('/log-history', 'LogHistoryController@index')->name('log-history.index');  
    Route::get('/log-history/get', 'LogHistoryController@cgJson')->name('log-history.get');    

    // Log-History
    Route::get('/locater', 'LocaterController@index')->name('locater.index');  
    Route::get('/locater/get', 'LocaterController@cgJson')->name('locater.get');    

});
