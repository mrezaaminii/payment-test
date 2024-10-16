<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'fromCurrencyCode' => 'required|integer|exists:currencies,currency_code',
            'toCurrencyCode' => 'required|integer|exists:currencies,currency_code',
            'email' => 'required|email|min:3',
            'mobile' => ['required','string','regex:/^(0|0098|\\+98)9(0[1-5]|[13]\d|2[0-2]|98)\d{7}$/'],
            'firstName' => 'required|string|min:2|max:100',
            'lastName' => 'required|string|min:2|max:100',
            'address' => 'required|min:3|max:1000',
            'postalCode' => 'required|string|regex:/\b(?!(\d)\1{3})[13-9]{4}[1346-9][013-9]{5}\b/',
            'country' => 'required|string|exists:countries,name',
            'city' => 'required|string|exists:cities,name',
            'description' => 'string',
            'amount' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
}
