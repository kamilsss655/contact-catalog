<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Route::get('/', 'WelcomeController@index');

//Show static welcome page
Route::get('/', 'ContactController@index');

//Show static home page
Route::get('home', 'ContactController@index');

//Show login form
Route::get('login', 'UserController@showLogin');

// Check user credentials -> Login or Error
Route::post('login', 'UserController@doLogin');

//Log user out
Route::get('logout', 'UserController@doLogout');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//Route::get('profile', ['middleware' => 'auth', function()
//{
    // Only authenticated users may enter...
//}]);

