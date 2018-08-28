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
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['prefix' => 'admin',  'middleware' => 'UrlAuthentication'], function()
// {
//     Route::get('/', 'HomeController@index' );

//     Route::get('dashboard', function() {} );

// });

// Route::resource('users', 'UserController');

Route::group(['middleware' => 'UrlAuthentication'], function()
{
    Route::resource('users', 'UserController');

    Route::get('users/create/{roleName}','UserController@create')->middleware('UrlBasedAuthentication');

    // Route::get('users/edit/{roleName}','UserController@edit');
});
Route::get('/404', function(){
    return view('errors/404');
})->name('404');

// Gate::resource('users', 'UserPolicy', [
//     'is_allowed_to_add_roles' => 'check_add_permission',
// ]);