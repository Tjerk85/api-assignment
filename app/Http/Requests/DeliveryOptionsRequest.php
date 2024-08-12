<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class DeliveryOptionsRequest extends FormRequest
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
            'country' => Rule::in([
                    'NL',
                    'BE',
                    'EU',
                    'ROW',
                    'nl',
                    'be',
                    'eu',
                    'row'
                ]
            ),
            'package-type' => Rule::in([
                    'standard',
                    'pallet',
                    'mailbox',
                ]
            ),
            'shipment-date' => 'date_format:d-m-Y',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation error',
            'data' => $validator->errors()
        ], 400));
    }
}
