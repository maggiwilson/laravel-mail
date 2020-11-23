<?php

namespace App\Http\Controllers;
use Mail;

use App\Mail\Contact;

use illuminate\Mail\Mailer;



use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }
    public function store()
    {
        // $email =request('email');
        // dd($email);

        request()->validate(['email'=>'required|email']);

//   Mail::raw('Mail Created',function($message){
            // $message->to(request('email'))
                
            //     ->subject('Welcome to Subscribers');
            
            Mail::to(request('email'))
                // ->send(new ContactMe('Safe Email'));
                   ->send(new Contact());
            
        
        return redirect('/contact')
            ->with('message','Email Sent');
    }
}
