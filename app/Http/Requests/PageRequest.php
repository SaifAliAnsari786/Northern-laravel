<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'page_name' => ['required', 'string'],
            'page_description' => ['nullable', 'string'],
            'seo_title' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],
            'seo_keyword' => ['nullable', 'string'],
            'seo_meta_keyword' => ['nullable', 'string'],
            'status' => ['required', 'numeric'],
            'page_image' => 'nullable|mimes:jpeg,png,jpg,web,pdf|max:10240',
            'page_image_alt' => ['nullable', 'string'],
        ];
    }
}
