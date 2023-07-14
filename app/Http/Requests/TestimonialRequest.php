<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'author_name' => ['required', 'string'],
            'author_designation' => ['required', 'string'],
            'review' => ['required', 'string'],
            'image' => 'required|mimes:jpeg,png,jpg,web|max:10240',
            'image_alt' => ['required', 'string'],
            'status' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {

        return [
            'author_name.required' => 'Author name is required',
            'author_designation.required' => 'Author designation  is required',
            'review.required' => 'Review  is required',
            'image.required' => 'Image  is required',
            'image_alt.required' => 'Image Alt is required',
            'status.required' => 'Status  is required',
        ];
    }
}
