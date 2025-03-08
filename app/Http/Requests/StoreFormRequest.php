<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function messages(): array
    {
        return [
            "name.required" => "name field is required",
            "email.required" => "email field is required",
            "phone.required" => "phone field is required",
            "message.required" => "message field is required",
        ];
    }



}
