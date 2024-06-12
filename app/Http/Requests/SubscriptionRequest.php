<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
            'deviceUuid' => 'required|string|exists:users,device_uuid',
            'productId' => 'required',
            'receiptToken' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'deviceUuid.required' => 'Device name is required',
            'deviceUuid.string' => 'Device name must be string',
            'deviceUuid.exists' => 'Device UUID already exists',
            'productId.required' => 'Product ID is required',
            'receiptToken.required' => 'Receipt Token is required',
            'receiptToken.string' => 'Receipt Token must be string',
        ];
    }
}
