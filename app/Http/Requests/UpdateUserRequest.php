<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes','string','max:255'],
            'email' => ['sometimes','email','max:255'],
            'is_admin' => ['sometimes','boolean'],
            'is_active' => ['sometimes','boolean'],
            'is_pending' => ['sometimes','boolean'],
            'password' => ['nullable','min:6','confirmed'],
        ];
    }
}
