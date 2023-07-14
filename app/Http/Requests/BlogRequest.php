<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'publish_date' => ['nullable', 'date'],
            'author_name' => ['nullable', 'string'],
            'author_position' => ['nullable', 'string'],
            'type' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'seo_title' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],
            'seo_keyword' => ['nullable', 'string'],
            'seo_meta_keyword' => ['nullable', 'string'],
            'status' => ['required', 'numeric'],
            'image' => 'required|mimes:jpeg,png,jpg,web|max:10240',
            'image_alt' => ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email address must be unique',
            'batch_id.required' => 'Batch is required',
            'amount.required' => 'Amount is required',
            'name.required' => 'Name is required',
            'discount.required' => 'Discount is required',
            'payment_status.required' => 'Payment Status is required',
            'bank_status.required' => 'Bank Status  is required',
            'branch_id.required' => 'Branch is required',
        ];
    }
}
