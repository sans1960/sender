<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
         public function sendEmail(Request $request)
    {
        $request->validate([
          'email' => 'required|email',
         
          'name' => 'required',
          'message' => 'required',
        ]);

        $data = array(
         
          'name' => $request->name,
          'email' => $request->email,
          'message' => $request->message
        );

       Mail::to($request->email)->send(new ContactMail($data));
        session()->flash('notif.success', 'Email enviat!');
       return redirect()->route('home');

        
    }
}
