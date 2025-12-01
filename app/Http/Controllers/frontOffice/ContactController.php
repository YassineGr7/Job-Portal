<?php

namespace App\Http\Controllers\frontOffice;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('layouts.contact');
    }

    public function send(Request $request) {

        // Validate the incoming request
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Get the admin email from the environment
        $adminEmail = env('ADMIN_EMAIL');

        // get the logged-in user information
        $user = Auth::user();
        $username = $user->first_name . ' ' . $user->last_name  ;
        $userEmail = $user->email ;

        // send the message and the subject of logged-in user to the admin
        Mail::to($adminEmail)->send(new ContactMail($username, $userEmail, $request->subject, $request->message));

        return redirect()->route('contact.index')->with('success', 'Message sent!');

    }

}
