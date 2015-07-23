<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';
    
    /**
     * Returns welcome page.
     */
    public function index()
    {
       return view('welcome');
    }
}