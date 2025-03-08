<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use App\Models\FeedBack;

class FeedBackController extends Controller
{
   public function store(StoreFormRequest $request){

    $validated = $request->validated();

    $contactData = FeedBack::create($validated);

    return response()->json(['message' => 'Contact form submitted successfully!', 'data' => $contactData], 201);
   }
}
