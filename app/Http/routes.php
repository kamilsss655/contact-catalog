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

// show a static view for the home page (app/views/index.blade.php)
Route::get('/', function(){
    return View::make('index');
});

//Registration, login default routes - comes from Laravel AuthController
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//Group using auth middleware - below routes can only be accessed by logged in users
Route::group(['middleware' => 'auth'], function() {
    
    //Show list of user contacts and home page
    Route::resource('contact', 'ContactsController',
                ['only' => ['index']]);
   
    //Show user profile - resource generates CRUD methods to use in the future
    Route::resource('user', 'UsersController',
                ['only' => ['index']]);
    
    
});
