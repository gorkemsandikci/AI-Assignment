<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'deviceName' => 'required|string',
            'deviceUuid' => 'required|unique:users,device_uuid',
        ];
    }
    public function messages(): array
    {
        return [
            'deviceName.required' => 'Device name is required',
            'deviceName.string' => 'Device name must be string',
            'deviceUuid.required' => 'Device UUID is required',
            'deviceUuid.unique' => 'Device UUID already exists'
        ];
    }
}
