<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SaveProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required|numeric|min:0',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'message' => 'Error de validacion',
            'details' => $validator->errors()
        ], 422); // 422 Unprocessable Entity

        throw new HttpResponseException($response);
    }
}
