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
        $contacts = Contact::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(10);
        
        //Update contact count stored in session
        $this->updateContactsCount();
        
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
     * Store a newly created contact in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //create new contact
        $contact = new Contact;
        //add contact to the currently logged in user
        $contact->user_id = Auth::user()->id;
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->city = $request->input('city');
        $contact->street = $request->input('street');
        $contact->house_number = $request->input('house_number');
        $contact->county = $request->input('county');
        $contact->zip_code = $request->input('zip_code');
        //work to do - to implement file uploads
        $contact->filename = $request->input('filename');
        //store new contact in storage
        $contact->save();
        //Update contact count stored in session
        $this->updateContactsCount();
        //return to contacts view
        return redirect()->action('ContactsController@index');
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
     * Remove the specified contact from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $contact = Contact::findOrFail($id);
        $contact = Contact::where('user_id', '=', Auth::user()->id)->firstOrFail();
        $contact->delete();
        //Update contact count stored in session
        $this->updateContactsCount();
        
        //return to contacts view
        return redirect()->action('ContactsController@index');
    }
    
    private function updateContactsCount() {
        //Number of contact that the currently logged in user has
        //Store number of contacts in session so its accessible across the site, in every view (my invention)
        //Need to call this every time contact is added or deleted
        $contactCount = Contact::where('user_id', Auth::user()->id)->count();
        Session::put('contactCount', $contactCount);
    }
}
