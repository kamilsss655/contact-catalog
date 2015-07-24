<?php

namespace App\Http\Controllers;

use App\User;
use App\Contact;
use App\County;
use Auth;
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
    
    //List currently authenticated user contacts
    public function listContacts()
    {
        //Paginate contacts of the currently authenticated user
       $contacts = Contact::where('user_id', Auth::user()->id)->paginate(10);
       //Show number of contact that the currently logged in user has
       $contactCount = Contact::where('user_id', Auth::user()->id)->count();
       //Pass data to the view
        return view('contact.list',compact('contacts','contactCount'));
        //return view('contact.list', ['allUsers' => User::paginate(15)]);
    }
}