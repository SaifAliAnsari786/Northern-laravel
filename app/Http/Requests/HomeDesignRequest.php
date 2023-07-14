<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeDesignRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'design_description' => ['required', 'string'],
            'over_view_description' => ['required', 'string'],
            'over_view_description_end' => ['required', 'string'],
            'total_area' => ['required', 'string'],
            'house_area' => ['required', 'string'],
            'mid_block_width' => ['required', 'string'],
            'house_width' => ['required', 'string'],
            'house_depth' => ['required', 'string'],
            'floor_plan_description' => ['required', 'string'],
            'floor_plan_note' => ['required', 'string'],
            'floor_plan_image' => 'required|mimes:jpeg,png,jpg,gif,webp',
            'floor_plan_image_alt' => ['nullable', 'string'],
            'virtual_tour_description' => ['nullable', 'string'],
            'virtual_tour_link' => ['nullable', 'string'],
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpg,jpeg,png,webp',
            'image_alt' => 'nullable|array',
            'type_of_feature' => 'nullable|array',
            'feature' => 'nullable|array',
            'feature_order_by' => 'nullable|array',
            'type_of_dimension' => 'nullable|array',
            'room_name' => 'nullable|array',
            'room_dimension' => 'nullable|array',
            'seo_title' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],
            'seo_keyword' => ['nullable', 'string'],
            'seo_meta_keyword' => ['nullable', 'string'],
            'design_type' => ['required', 'numeric'],
            'status' => ['required', 'numeric'],
            'image_order_by' => 'nullable|array',
        ];
    }

    public function messages()
    {

        return [
            'status.required' => 'Status  is required',
            'main_heading.required' => 'Main heading is required',
            'sub_heading.required' => 'Sub heading  is required',
            'description.required' => 'Slider description  is required',
        ];
    }
}
