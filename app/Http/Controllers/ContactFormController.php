<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactFormController extends Controller
{
    // Contact Form
    public function index(Request $request) {
        return view('contact');
    }

    // Store Contact Form data
    public function storeFormData(Request $request) {

        // Form validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Store data in database
        Contact::create($request->all());

        return back()->with('success', 'Thank you for writing to us.');
    }
}
