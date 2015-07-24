<?php

namespace App\Http\Controllers;

use App\User;
use App\Contact;
use App\County;
use Auth;
use Session;

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
       
       //Number of contact that the currently logged in user has
       $contactCount = Contact::where('user_id', Auth::user()->id)->count();
       
       //Store number of contacts in session so its accessible across the site, in every view (my invention)
       //Need to call this every time contact is added or deleted
       Session::put('contactCount', $contactCount);
      
       //Pass contact list data to the view
        return view('contact.list',compact('contacts'));
    }
}