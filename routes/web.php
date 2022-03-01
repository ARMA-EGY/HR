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

Route::get('/', function () {return redirect('/login');});
Route::get('/admin', function () {return redirect('/login');});


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    Auth::routes();
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'auth','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    Route::get('/profile', 'Auth\ProfileController@profile')->name('profile');
    Route::post('/editinfo', 'Auth\ProfileController@editinfo')->name('profile.edit-info');
    Route::post('/changeProfilePicture', 'Auth\ProfileController@changeProfilePicture')->name('profile.change-picture');
    Route::post('/changepassword', 'Auth\ProfileController@changepassword')->name('profile.change-password');
});


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'auth','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () 
{
    Route::prefix('master')->name('master.')->namespace('Master')->group(function () 
    {
        Route::get('/home', 'HomeController@index')->name('home');
        
        //CONTRACTS ROUTES
        Route::resource('/contract', 'ContractsController');

        //DEPARTMENTS ROUTES
        Route::resource('/department', 'DepartmentsController');

        //EMPLOYEES ROUTES
        Route::resource('/employee', 'EmployeesController');

        //WORK ADDRESS ROUTES
        Route::resource('/workAddresses', 'WorkAddressesController');
        Route::post('/getWorkAddress', 'WorkAddressesController@get')->name('getWorkAddress');

        //WORK LOCATION ROUTES
        Route::resource('/workLocation', 'WorkLocationController');
        Route::post('/getWorkLocation', 'WorkLocationController@get')->name('getWorkLocation');

        //WORKING HOURS ROUTES
        Route::resource('/workingHours', 'WorkingHoursController');
        Route::post('/getWorkingHours', 'WorkingHoursController@get')->name('getWorkingHours');

        //JOB POSITIONS ROUTES
        Route::resource('/jobPosition', 'JobPositionController');
        Route::post('/getJobPosition', 'JobPositionController@get')->name('getJobPosition');

        //ADDRESS ROUTES
        Route::resource('/address', 'AddressController');
        Route::post('/getAddress', 'AddressController@get')->name('getAddress');
        
    });

    Route::prefix('leaves')->name('leaves.')->group(function () 
    {
        Route::get('/home', 'Leaves\Home\HomeController@index')->name('home');
    });

    Route::prefix('payroll')->name('payroll.')->group(function () 
    {
        Route::get('/home', 'Payroll\Home\HomeController@index')->name('home');
    });

    Route::prefix('tasks')->name('tasks.')->group(function () 
    {
        Route::get('/home', 'Tasks\Home\HomeController@index')->name('home');
    });

});
