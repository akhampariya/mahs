<?php

/**
 *|--------------------------------------------------------------------------
 *| Application Routes
 *|--------------------------------------------------------------------------
 *|
 *| Here is where you can register all of the routes for an application.
 *| It's a breeze. Simply tell Laravel the URIs it should respond to
 *| and give it the controller to call when that URI is requested.
 *|
 *
 * @category   Application Routes
 * @package    Basic-Routes
 * @author     Sachin Pawaskar<spawaskar@unomaha.edu>
 * @copyright  2016-2017
 * @license    The MIT License (MIT)
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('php-version', function()
{
    return phpinfo();
});

Route::get('laravel-version', function()
{
    $laravel = app();
    return 'Your Laravel Version is '.$laravel::VERSION;
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::post('change-password', 'Auth\AuthController@updatePassword');
    Route::get( 'change-password', 'Auth\AuthController@updatePassword');

    Route::get('/home', 'HomeController@index');

    Route::resource('users', 'UsersController');

    Route::resource('roles', 'RolesController');
	// adding new table 
	Route::resource('workorders', 'WorkOrderController');
    Route::resource('Property', 'PropertyController');
   Route::resource('apartments', 'ApartmentController');
    

// Excel routes - 
Route::get('import', 'ExcelController@import');
Route::get('importx', 'ExcelController@importx');
Route::get('importcus', 'ExcelController@importcus');
Route::get('downloadExcel/{type}', 'ExcelController@downloadExcel');
Route::get('aptrpt/{type}', 'ExcelController@aptrpt');
Route::get('msgq/{type}', 'ExcelController@msgq');
Route::post('importExcel', 'ExcelController@importExcel');
// 
Route::get('contact-us', 'ContactUSController@contactUS');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);
Route::get('userrequests', 'ContactUSController@userrequests');