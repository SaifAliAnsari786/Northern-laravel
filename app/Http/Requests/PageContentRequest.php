<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageContentRequest extends FormRequest
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
            'section_name' => ['required', 'string'],
            'section_description' => ['nullable', 'string'],
            'status' => ['required', 'numeric'],
            'section_image' => 'nullable|mimes:jpeg,png,jpg,web,pdf|max:10240',
            'section_image_alt' => ['nullable', 'string'],
        ];
    }
}
