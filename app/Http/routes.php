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

//Registration, login default routes - comes from Laravel
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//Group using auth middleware - below routes can only be accessed by logged in users
Route::group(['middleware' => 'auth'], function() {
   
    //Show user profile
    Route::get('profile', 'UserController@showProfile'); 
    //Show static user home page
    Route::get('home', 'ContactController@index');
    //Show list of user contacts
    Route::get('contacts', 'ContactController@listContacts');
    
});
