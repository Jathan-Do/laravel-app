<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:200',
            'des' => 'required|max:200',
            'price' => 'required',
            'promotional_price' => 'required',
            'exp_date' => 'required',
            'status' => 'required',
            'infomation' => 'required',
        ];
        if ($this->route()->getName() === 'service.store') {
            $rules['feature_image'] = 'required';
        }

        return $rules;
    }
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
                // 'name.required' => 'The name field is required.',
                // 'name.max' => 'The name field should not exceed 200 characters.'
            ];
    }
}
