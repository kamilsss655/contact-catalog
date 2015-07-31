<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contact;
use Auth;
use Mail;
use Validator;

class MessagesController extends Controller
{
    /**
     * Show the form for composing new email message.
     *
     * @return Response
     */
    public function create($contactId)
    {
        //find contact by id
        $contact = Contact::where('user_id', '=', Auth::user()->id)->find($contactId);
        
        //check if contact exists
        if ($contact==null) {
            //if it doesnt exist goto contact list with not found error
            return redirect()->action('ContactsController@index')->with('error', 'Podany kontakt nie istnieje');
        }
        else {
            //return contact 
            return view('messages.create',compact('contact'));
        }
        
        
        
    }

    /**
     * Send email message to the specified contact.
     *
     * @param  Request  $request
     * @return Response
     */
    public function send(Request $request)
    {
        //get user input
        $messageContent=$request->input('message');
        $contactId=$request->input('contactId');
        //validate user input
        $v = $this->validateInput($request);
        //if validation fails redirect user to page with validation errors
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        //if validation passes proceed
        else {
            //find contact by id
            $contact = Contact::where('user_id', '=', Auth::user()->id)->find($contactId);
            
            // check if contact exists
            /*security measure from POST injection attacks
            regular user is unable to generate such request without POST form injection
            unless other person logged in as the same user deleted contact while first user was composing message
            this shows error message in such case*/
            if ($contact==null) {
                //if it doesnt exist goto contact list with not found error
                return redirect()->action('ContactsController@index')->with('error', 'Podany kontakt nie istnieje');
            }
            else {
                //send welcome email message to user mailbox
                // Mail::send('emails.message', ['message' => $message], function ($m) use ($message) {
                //     $m->to($contact->email)->subject('Wiadomość prywatna');
                // });
                $user=Auth::user();
                $data=array(
                    'contactFirstName' => $contact->first_name,
                    'contactLastName' => $contact->first_name,
                    'contactEmail' => $contact->email,
                    'userFirstName' => $user->first_name,
                    'userLastName' => $user->last_name,
                    'userEmail' => $user->email,
                    'message' => $messageContent
                    );
                //queue message to shorten application response time
                Mail::queue('emails.message', ['data' => $data], function ($m) use ($data) {
                    $m->to($data['contactEmail'])->from('message@laravel-kamilsos.c9.io','Zespół Contacto')->subject('Prywatna wiadomość od '.$data['userEmail']);
                });
                //return to contacts view
                return redirect()->action('ContactsController@index')->with('status', 'Wysłano wiadomość do '.$contact->email);  
        }

        }
        
    }
    
    //validate user input
    private function validateInput($request){
        $v = Validator::make($request->all(), [
            'contactId'    =>      'required',
            'message'      =>      'required|max:800'
        ]);
        return $v;
    }
    
}
