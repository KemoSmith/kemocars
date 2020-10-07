<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleFilterRequest extends FormRequest
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
            'make' => 'string|max:25|nullable',
            'model' => 'string|max:25|nullable',
            'min_year' => 'integer|max:2025|nullable',
            'max_year' => 'integer|max:2025|nullable',
            'steering' => 'string|max:25|nullable',
            'min_cc' => 'integer|min:0|max:100000|nullable',
            'max_cc' => 'integer|min:0|max:100000|nullable',
            'min_km' => 'integer|min:0|max:500000|nullable',
            'max_km' => 'integer|min:0|max:1000000|nullable',
            'min_price' => 'integer|max:1000000000|nullable',
            'max_price' => 'integer|max:1000000000|nullable',
            'drive' => ['nullable', Rule::in(['Rear Wheel Drive', 'Front Wheel Drive', 'Four Wheel Drive', 'All Wheel Drive'])],
            'transmission' => ['nullable', Rule::in(['Automatic', 'Manual', 'CVT', 'Other'])],
            'fuel' => ['nullable', Rule::in(['Petrol', 'Diesel', 'LPG', 'Electric', 'Hybrid', 'Other'])],
            'condition' => ['nullable', Rule::in(['New', 'Foreign Used', 'Used', 'Refurbished'])],
        ];
    }
}
