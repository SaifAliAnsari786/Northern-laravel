<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'question' => ['required', 'string'],
            'status' => ['required', 'numeric'],
            'answer' => ['required', 'string'],
        ];
    }

    public function messages()
    {

        return [
            'question.required' => 'Question  is required',
            'status.required' => 'Status is required',
            'answer.required' => 'Answer  is required',
        ];
    }
}
