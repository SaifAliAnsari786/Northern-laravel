<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
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
        if (request('type') == 1) {
            return [
                'status' => ['required', 'numeric'],
                'main_heading' => ['required', 'string'],
                'sub_heading' => ['required', 'string'],
                'description' => ['required', 'string'],
                'image' => 'sometimes|mimes:jpeg,png,jpg,web|max:10240',
                'image_alt' => ['nullable', 'string'],
            ];
        } else {
            return [
                'status' => ['required', 'numeric'],
                'type' => ['required', 'numeric'],
                'image' => 'required|file|mimetypes:video/mp4',
            ];
        }

    }

}
