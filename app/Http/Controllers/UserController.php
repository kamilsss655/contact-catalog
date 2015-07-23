<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Input;
use Redirect;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';
    
    //Show login page
    public function showLogin()
    {
       return view('user.login');
    } 
    //Log user in
    public function doLogin()
    {
        
        $email = Input::get('email');
        $password = Input::get('password');
        
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->intended('/');
        }
        else {
             return Redirect::back()->withInput()->with('failure','username or password is invalid!');
        }
    }
}