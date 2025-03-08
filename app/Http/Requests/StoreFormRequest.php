<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "email" => "required|email",
            "phone" => "required",
            "message" => "required",
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'name is required',
            'email.required' => 'email is required',
            'email.email' => 'enter a valid address email',
            'message.required' => 'message is required',
        ];
    }

    protected function handleInternalServerError()
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'An internal server error occurred. Please try again later.'
        ], 500));
    }

    protected function validationFailed(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ],422));
    }
}

