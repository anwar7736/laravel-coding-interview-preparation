<?php

namespace App\Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'unique:products,name,'.$this->route('id')],
            'brand_id' => ['required', 'numeric'],
            'categories.*' => ['required', 'numeric'],
            'unit_id' => ['required', 'numeric'],
            'warranty_id' => ['nullable', 'numeric'],
            'alert_quantity' => ['nullable', 'numeric'],
            'type' => ['required', 'numeric'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'seo_meta_title' => ['nullable', 'string'],
            'seo_meta_description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:png,jpg'],
            'images.*' => ['nullable', 'image', 'mimes:png,jpg'],
            'sizes.*' => ['nullable', 'numeric'],
            'colors.*' => ['nullable', 'numeric'],
            'storages.*' => ['nullable', 'numeric'],
            'purchase_price.*' => ['required', 'numeric', 'min:0'],
            'selling_price.*' => ['required', 'numeric', 'min:0'],
            'quantity.*' => ['required', 'numeric', 'min:0'],
        ];
    }
}
