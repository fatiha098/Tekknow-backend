<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Auth::user()->contacts;
        return response()->json($contacts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:users,id|different:auth_user_id',
        ]);
    
        $user = Auth::user();
    
        // Check if the contact already exists

        if ($user->contacts->contains('id', $request->contact_id)) {
            return response()->json(['message' => 'Contact already exists']);
        }
    
        $user->contacts()->attach($request->contact_id);

    
        return response()->json(['message' => 'Contact added successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact, $id)
    {
        $user = Auth::user();

    if (!$user->contacts()->where('contact_id', $id)->exists()) {
        return response()->json(['message' => 'Contact not found'], 404);
    }

    $user->contacts()->detach($id);

    return response()->json(['message' => 'Contact removed successfully']);
    }
}

