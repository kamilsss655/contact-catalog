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
    
    //Show profile page
    public function showProfile()
    {
        //check if user is logged in
        if (Auth::check()) {
            return view('user.profile');
        }
        //if user is not logged in -> ask him to log in
        else {
            return redirect()->guest('auth/login');
        }
    } 
}