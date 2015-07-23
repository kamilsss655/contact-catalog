<?php

namespace App\Http\Controllers;

use App\User;
use App\Contact;
use App\County;
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
    
    
    public function listContacts()
    {
       // $allUsers = User::paginate(15);
       $name="janek";
       $counties = Contact::paginate(3);
        return view('contact.list',compact('name','counties'));
        //return view('contact.list', ['allUsers' => User::paginate(15)]);
    }
}