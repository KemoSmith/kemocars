<?php

namespace App\Http\Requests;

use App\Vehicle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleUpdateRequest extends FormRequest
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
            "make" => 'string|required|max:25',
            "model" => 'string|required|max:25',
            "year" => 'integer|required|min:1990|max:2025',
            "chassis" => 'string|required|max:80',
            "engine_displacement" => 'integer|max:30000|required',
            "engine_model" => 'string|required|max:25',
            "fuel" => ['required', Rule::in(['Petrol', 'Diesel', 'LPG', 'Electric', 'Hybrid', 'Other'])],
            "distance" => 'integer|max:1000000000|required',
            "seats" => 'integer|required|max:500',
            "doors" => 'integer|required|max:500',
            "transmission" => ['required', Rule::in(['Automatic', 'Manual', 'CVT', 'Other'])],
            "driving_wheels" => ['required', Rule::in(['Rear Wheel Drive', 'Front Wheel Drive', 'Four Wheel Drive', 'All Wheel Drive'])],
            "colour" => 'string|required|max:25',
            "steering" => ['required', Rule::in(['Left Hand Drive', 'Right Hand Drive', 'Other'])],
            "location" => 'string|required|max:100',
            "weight" => 'nullable|integer|max:100000',
            "size" => 'nullable|string|max:25',
            "condition" => ['required', Rule::in(['New', 'Foreign Used', 'Used', 'Refurbished'])],
            "description" => 'nullable|string|max:500',
            "price" => 'required|numeric|max:1000000000',
            "images" => $this->imagesRule(),
            "images.*" => 'required|image',
            "show_ci" => 'array',
            "show_ci.*" => 'integer|exists:contact_infos,id'
        ];
    }

    private function imagesRule()
    {
        $vehicle = request()->route('vehicle');
        $allowedAmount = 19 - count($vehicle->image);
        return "array|max:$allowedAmount";
    }
}
