<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function store(StoreFormRequest $request){

    // $validated = $request->validate([
    //     'name' => 'required|string|max:255',
    //     'email' => 'required|email',
    //     'phone' => 'required',
    //     'message' => 'required|string|max:1000',
    // ]);

    $validated = $request->validated();

    $contactData = Contact::create($validated);

    return response()->json(['message' => 'Contact form submitted successfully!', 'data' => $contactData], 201);
   }
}
