<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        // TODO: flash validaion messages in create form page
        return [
            'name.required' => 'The shop name is required.',
            'email.required' => 'The shop email is required.',
            'email.email' => 'The shop email must be a valid email address.',
            'is_active.boolean' => 'The active status must be true or false.',
        ];
    }
}
