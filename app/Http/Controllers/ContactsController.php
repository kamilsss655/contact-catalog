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
use Image;
use DB;
use View;

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
        return view('contacts.create');
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
              
        //validate input      
        $v = $this->validateInput($request);
        //show form with user input and errors so user can correct input
        if ($v->fails())
        {
            $request->flash();
            return redirect()->action('ContactsController@create',compact('contact'))->withErrors($v->errors());
        }
        //if validation passed
        else
        {
            //handle image upload, store image and store file path
             $contact->filename = $this->imageUpload();
        
            //store new contact if validation passed successfully
            $contact->save();
            //Update contact count stored in session
            $this->updateContactsCount();
            //return to contacts view
            
            
            return redirect()->action('ContactsController@index')->with('status', 'Dodano '.$contact->email);
        }
    }
    
     /**
     * List contacts matching search criteria
     *
     * @return Response
     */
    public function search(){
        //get input query
        $query = Input::get('q');
        //get results from db
        //make sure we search contacts belonging only to the currently logged in user
        $results = Contact::where('user_id', Auth::user()->id)
            //perform search
            ->search($query)
            //paginate results
            ->paginate(10);
        //return view with the results
        return view('contacts.search',compact('results','query'));
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
            //if it doesnt exist goto contact list with not found error
            return redirect()->action('ContactsController@index')->with('error', 'Podany kontakt nie istnieje');
        }
        else {
            //return contact 
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
        //show edit form
        return view('contacts.edit', ['contact' => Contact::where('user_id', '=', Auth::user()->id)->find($id)]);
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
         //validate input      
        $v = $this->validateInput($request);
        
        //if validation is not passed show user input errors
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        //if validation passed
        else {
            //find contact by id
            $contact = Contact::where('user_id', '=', Auth::user()->id)->find($id);
            
            //User wants to delete old photo
            //check if deleteOldPhoto checkbox is checked
            if (Input::has('deleteOldPhoto')) {
                //delete old photo
                File::delete('storage/contact-images/'.$contact->filename);
                //set filename db table field to null
                $contact->filename=null;
                //save changes
                $contact->save();
            } 
            //handle request data
            $contact->first_name = $request->input('first_name');
            $contact->last_name = $request->input('last_name');
            $contact->phone = $request->input('phone');
            $contact->email = $request->input('email');
            $contact->city = $request->input('city');
            $contact->street = $request->input('street');
            $contact->house_number = $request->input('house_number');
            $contact->county = $request->input('county');
            $contact->zip_code = $request->input('zip_code');
            //if user wants to update picture make sure to delete old picture
            if(Input::file('image') != null){
                //delete old picture
                File::delete('storage/contact-images/'.$contact->filename);   
                 //save and store new picture into user contact
                $contact->filename = $this->imageUpload();
            }
            
            //store new contact in storage
            $contact->save();
            
            return redirect()->action('ContactsController@index')->with('status', 'Zmodyfikowano '.$contact->email);
        }
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
        return redirect()->action('ContactsController@index')->with('warning', 'Usunięto '.$contact->email);
    }
    //Update number of contact that the currently logged in user has
    private function updateContactsCount() {
        //Store number of contacts in session so its accessible across the site, in every view (my invention)
        //Need to call this every time contact is added or deleted
        $contactCount = Contact::where('user_id', Auth::user()->id)->count();
        Session::put('contactCount', $contactCount);
    }
    
    //validate user input
    private function validateInput($request){
        $v = Validator::make($request->all(), [
            'first_name'    =>      'required|max:15',
            'last_name'     =>      'max:32',
            'email'         =>      'required|max:50',
            'phone'         =>      'max:20',
            'city'          =>      'max:32',
            'street'        =>      'max:75',
            'house_number'  =>      'max:8',
            'county'        =>      'max:20',
            'zip_code'      =>      'max:6'
        ]);
        return $v;
    }
    
    //handle image upload and return $filepath to saved resource
    //real filepath is public/storage/contact-images/$filepath
    private function imageUpload() {
        
        $imageFile=Input::file('image');
        if ($imageFile != null) {
              // getting all of the post data
            $file = array('image' => $imageFile);
            // setting up rules
            $rules = array('image'=>'image|max:3000'); //mimes:jpeg,bmp,png and for max size max:10000
            // doing the validation, passing post data, rules and the messages
            $validator = Validator::make($file, $rules);
            //if validation fails
            if ($validator->fails()) {
                // send back to the page with the input data and errors
                
                redirect()->back()->with('error', 'Nieprawidłowy obraz. Maksymalny rozmiar: 3MB. Obsługiwane formaty: JPG, PNG, BMP ');
    
    
            }
            //if validation passes
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
                    //filename is random due to high entropy $randomString and is unique due to uniqid()) value based on timestamp
                    $fileName = strval(uniqid()).$randomString.'.'.$extension; // renaming image
    
                    //well if we are REALLY unlucky and generate filename that already exists lets generate another trully unique one
                    //to be this unlucky we would have to generate 2 high entropy strings in a single microsecond - very unlikely but possible
                    while (File::exists('storage/contact-images/'.$randomDir.'/'.$fileName)){
                        //generate high entropy string to prevent image url guessing
                        $length = 20;
                        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
                        //filename is unique due to high entropy $randomString and is unique due to uniqid()) value based on timestamp
                        $fileName = strval(uniqid()).$randomString.'.'.$extension; // renaming image
                    }
                    
                    $imageFile->move($destinationPath, $fileName); // uploading file to given path
    
                    //filepaths of the image
                    $filePath=$randomDir.'/'.$fileName;
                    $globalFilePath='storage/contact-images/'.$filePath;
                    
                    //open image to process with imagick
                    $img = Image::make($globalFilePath);
                    
                    //read EXIF and set proper orientation - fixes rotated images when getting images from mobile camera
                    $img->orientate();
                    
                    // crop the best fitting 1:1 (100x100) ratio and resize to 100x100 pixel
                    $img->fit(100, 100, function ($constraint) {
                        $constraint->upsize();
                    });
                    
                    //save resized image with quality of 80%
                    $img->save($globalFilePath, 80);
                    
                    //return filepath of the image
                    return $filePath;
                }
                else {
                    // sending back with error message.
                    redirect()->back()->with('error', 'Nieprawidłowy obraz. Maksymalny rozmiar: 3MB. Obsługiwane formaty: JPG, PNG, BMP ');
                }
            }
        }
    
    }
   
    
}
