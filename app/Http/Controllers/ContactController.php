<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function store(Request $request){

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email|max:255',
        'phone' => 'required|digits_between:10,15',
        'message' => 'required|string|max:1000',
    ]);


    $contactData = Contact::create($validated);

    return response()->json(['message' => 'Contact form submitted successfully!', 'data' => $contactData], 201);
   }
}
