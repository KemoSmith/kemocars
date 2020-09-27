<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "make" => 'required|string|max:25',
            "model" => 'required|string|max:25',
            "year" => 'required|integer|min:1990|max:2025',
            "chassis" => 'required|string|max:80',
            "engine_displacement" => 'required|integer|max:30000',
            "engine_model" => 'required|string|max:25',
            "fuel" => ['required', Rule::in(['Petrol', 'Diesel', 'LPG', 'Electric', 'Hybrid', 'Other'])],
            "distance" => 'required|integer|max:1000000000',
            "seats" => 'required|integer|max:500',
            "doors" => 'required|integer|max:500',
            "transmission" => ['required', Rule::in(['Automatic', 'Manual', 'CVT', 'Other'])],
            "driving_wheels" => ['required', Rule::in(['Rear Wheel Drive', 'Front Wheel Drive', 'Four Wheel Drive', 'All Wheel Drive'])],
            "colour" => 'required|string|max:25',
            "steering" => ['required', Rule::in(['Left Hand Drive', 'Right Hand Drive', 'Other'])],
            "location" => 'required|string|max:100',
            "weight" => 'nullable|integer|max:100000',
            "size" => 'nullable|string|max:25',
            "condition" => ['required', Rule::in(['New', 'Foreign Used', 'Used', 'Refurbished'])],
            "description" => 'nullable|string|max:500',
            "price" => 'required|numeric|max:1000000000|min:20000',
            "images" => 'array|max:30',
            "images.*" => 'required|image',
            "show_ci" => 'array',
            "show_ci.*" => 'integer|exists:contact_infos,id'
        ];
    }
}
