<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatRequest extends FormRequest
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
            'chatId' => 'nullable',
            'message' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'deviceUuid.required' => 'Device UUID is required',
            'deviceUuid.string' => 'Device UUID must be string',
            'deviceUuid.exists' => 'Device UUID already exists',
            'message.required' => 'Message is required'
        ];
    }
}
