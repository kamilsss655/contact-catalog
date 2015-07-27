<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Contact;
use Session;
use Input;
use Validator;
use Redirect;
use File;

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
        return view('contacts.list',compact('contacts'));
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
        //handle image upload, store image and store file path
        $contact->filename = $this->imageUpload();
        //store new contact in storage
        $contact->save();
        //Update contact count stored in session
        $this->updateContactsCount();
        //return to contacts view
        
        
        return redirect()->back()->with('status', 'Dodano '.$contact->email);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //find contact by id
        $contact = Contact::where('user_id', '=', Auth::user()->id)->find($id);
        
        //check if contact exists
        if ($contact==null) {
            //if it doesnt exist goto contact list
            return redirect()->action('ContactsController@index');
        }
        else {
            //return contact or fail if not found
            return view('contacts.show',compact('contact'));
        }

        
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
        //find requested contact with regard to auth user id
        $contact = Contact::where('user_id', '=', Auth::user()->id)->findOrFail($id);
        $contact->delete();
        //delete contact image
        if ($contact->filename != null) {
            File::delete('storage/contact-images/'.$contact->filename);
        }
        //Update contact count stored in session
        $this->updateContactsCount();
        
        //return to contacts view
        return redirect()->back()->with('warning', 'Usunięto '.$contact->email);
    }
    //Update number of contact that the currently logged in user has
    private function updateContactsCount() {
        //Store number of contacts in session so its accessible across the site, in every view (my invention)
        //Need to call this every time contact is added or deleted
        $contactCount = Contact::where('user_id', Auth::user()->id)->count();
        Session::put('contactCount', $contactCount);
    }
    
    private function imageUpload() {
          // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('upload')->withInput()->withErrors($validator);
        }
        else {
             // checking file is valid.
            if (Input::file('image')->isValid()) {
                //store images in random subdirectories - filesystem optimalisation
                //can be extended to some more advanced filesystem balancer system in the future
                $randomDir=strval(mt_rand(0,2));
                $destinationPath = 'storage/contact-images/'.$randomDir; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                
                //generate high entropy string to prevent image url guessing
                $length = 20;
                $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

                $fileName = $randomString.'.'.$extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Session::flash('success', 'Upload successfully'); 
                return $randomDir.'/'.$randomString.'.'.$extension;
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('upload');
            }
        }
    }
    
}
