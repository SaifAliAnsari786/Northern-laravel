<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoRequest extends FormRequest
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
            'seo_type' => ['required', 'numeric'],
            'seo_title' => ['required', 'string'],
            'seo_description' => ['required', 'string'],
            'seo_keyword' => ['required', 'string'],
            'seo_meta_keyword' => ['required', 'string'],
            'image' => 'sometimes|mimes:jpeg,png,jpg,web|max:10240',
            'image_alt' => ['nullable', 'string'],
        ];
    }
}
