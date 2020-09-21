<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class OrderValidateRequest extends FormRequest
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
    public function messages() {
        return [
            'name.required' => 'Name is Required.',
            'percentage.required' => 'Percentage is Required.',
            'no_of_service.required' => 'No of Service is Required.',
        ];
    }

    public function rules() {
        return [
            'name' => 'required|string',
            'percentage' => 'required|string',
            'no_of_service' => 'required|string',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            $validator->errors(),
        ], 422));
    }

}
