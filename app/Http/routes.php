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

//Show user profile
Route::get('profile', 'UserController@showProfile');

Route::get('contacts', array('before' => 'auth', 
    'uses' => 'UserController@showProfile')
);

Route::group(array('before' => 'auth'), function()
{
    Route::get('contacts', 'ContactController@listContacts');

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

