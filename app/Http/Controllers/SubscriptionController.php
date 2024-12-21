<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionEmail;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;

        // Send the subscription email
        Mail::to($email)->send(new SubscriptionEmail($email));

        return back()->with('success', 'Thank you for subscribing! A confirmation email has been sent to your inbox.');
    }
}
