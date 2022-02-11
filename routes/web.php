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
