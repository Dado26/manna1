<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\SendContactEmailRequest;
use Mail;
use App\Mail\Contact;
use Swift_TransportException;

class ContactController extends Controller
{
    public function showForm(){
        $user=Auth::user();
        return view('contact', compact('user'));
    }
    
    public function send_contact_email_attempt(SendContactEmailRequest $request){
        $data = ($request->all());
        
        try{
        Mail::to('admin@manna.com')->send(new Contact($data));
                    
        flash('Uspešno ste poslali vašu poruku!')->success();
        }catch(Swift_TransportException $exception){
            flash('Whoops... nešto je krenulo po zlu, vaša poruka nije poslata.')->error();
        }
        return redirect()->back();
    }
}
