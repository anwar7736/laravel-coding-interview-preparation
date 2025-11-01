<?php

namespace App\Modules\Product\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TransactionStoreRequest extends FormRequest
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
            'contact_id' => ['required', 'numeric'],
            'payment_method_id' => ['required', 'numeric'],
            'products.*' => ['required', 'array'],
            'products.*.id' => ['required', 'numeric'],
            'products.*.quantity' => ['required', 'numeric'],
            'products.*.size_id' => ['nullable', 'numeric'],
            'products.*.color_id' => ['nullable', 'numeric'],
            'products.*.storage_id' => ['nullable', 'numeric'],
            'account_number' => ['nullable'],
            'card_number' => ['nullable'],
            'payment_note' => ['nullable', 'string'],
            'sell_note' => ['nullable', 'string'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Validation errors',
            'errors' => $validator->errors()
        ]));
    }
}
