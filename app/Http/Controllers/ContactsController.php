<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Contact;
use Session;

class ContactsController extends Controller
{
    /**
     * List currently authenticated user contacts
     *
     * @return Response
     */
    public function index()
    {
        //Paginate contacts of the currently authenticated user
        $contacts = Contact::where('user_id', Auth::user()->id)->paginate(10);
        
        //Number of contact that the currently logged in user has
        //Store number of contacts in session so its accessible across the site, in every view (my invention)
        //Need to call this every time contact is added or deleted
        $contactCount = Contact::where('user_id', Auth::user()->id)->count();
        Session::put('contactCount', $contactCount);
        
        //Pass contact list data to the view
        return view('contact.list',compact('contacts'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        
            return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
