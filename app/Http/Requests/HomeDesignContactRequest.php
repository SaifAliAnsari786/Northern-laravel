<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeDesignContactRequest extends FormRequest
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
            'design_form_name' => ['required', 'string', 'max:255'],
            'design_email' => ['required', 'email', 'max:255'],
            'design_phone' => ['required', 'string', 'max:255'],
            'homeDesign_select' => ['nullable', 'numeric', 'max:10'],
            'design_message' => ['nullable', 'string', 'max:500'],
            'captcha_new_home_design' => ['required', 'captcha'],
        ];
    }
    public function messages()
    {
        return [
            'captcha_new_home_design.required' => 'Captcha is required!',
            'captcha_new_home_design.captcha' => 'The captcha is incorrect.',
        ];
    }
}
