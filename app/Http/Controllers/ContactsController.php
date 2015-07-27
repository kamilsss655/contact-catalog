<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App;
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
    
    //handle image upload and return $filepath to saved resource
    //real filepath is public/storage/contact-images/$filepath
    private function imageUpload() {
        
        $imageFile=Input::file('image');
        if ($imageFile != null) {

          // getting all of the post data
        $file = array('image' => $imageFile);
        // setting up rules
        $rules = array('image'=>'image|max:2000'); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            
            redirect()->back()->with('error', 'Nieprawidłowy obraz. Maksymalny rozmiar: 2MB. Obsługiwane formaty: JPG, PNG, BMP ');


        }
        else {
             // checking file is valid.
            if (Input::file('image')->isValid()) {
                //store images in random subdirectories - filesystem optimalisation
                //can be extended to some more advanced filesystem balancer system in the future
                $randomDir=strval(mt_rand(0,2));
                $destinationPath = 'storage/contact-images/'.$randomDir; // upload path
                $extension = $imageFile->getClientOriginalExtension(); // getting image extension
                
                //generate high entropy string to prevent image url guessing
                $length = 20;
                $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

                $fileName = $randomString.'.'.$extension; // renameing image
                $imageFile->move($destinationPath, $fileName); // uploading file to given path

                //return filepath of the image
                $filepath=$randomDir.'/'.$randomString.'.'.$extension;
                return $filepath;
            }
            else {
                // sending back with error message.
                redirect()->back()->with('error', 'Nieprawidłowy obraz. Maksymalny rozmiar: 2MB. Obsługiwane formaty: JPG, PNG, BMP ');
            }
        }
    }
    
        //
}
    
}
