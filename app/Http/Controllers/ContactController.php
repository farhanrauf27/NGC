<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:11|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        return redirect()->back()->with(['success' => 'Thank you for contact us. we will contact you shortly.']);

    }
    public function chooseHelp()
    {
        return view('choose');
    }
    public function designYour()
    {
        return view('design');
    }
    public function readyShip()
    {
        return view('toship');
    }
}