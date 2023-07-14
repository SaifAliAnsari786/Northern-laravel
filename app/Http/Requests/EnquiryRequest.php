<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnquiryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'suburb' => ['required', 'string', 'max:255'],
            'land_status' => ['required', 'numeric'],
            'floor_plan_version' => ['required', 'numeric'],
            'message' => ['nullable', 'string', 'max:500'],
            'join_email_status' => ['nullable', 'numeric'],
            'captcha-contact' => ['required', 'captcha'],
        ];
    }
    public function messages()
    {
        return [
            'captcha-contact.required' => 'Captcha is required!',
            'captcha-contact.captcha' => 'The captcha is incorrect.',
        ];
    }
}
