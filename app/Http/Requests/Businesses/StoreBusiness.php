<?php

namespace App\Http\Requests\Businesses;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusiness extends FormRequest
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
        return [
            'user_id'=>'string',
            'business_name'=>'string',
            'description'=>'string',
            'contact_number'=>'string',
            'email'=>'string',
            'website_url'=>'string',
            'address'=>'string',
            'latitude'=>'string',
            'longitude'=>'string',
            'operating_hours'=>'string',
            'employee_details'=>'string',
        ];
    }
}
