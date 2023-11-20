<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'uuid' => ['required', 'string', 'exists:members,uuid'],
            'username' => ['string', 'max:255'],
            'new_password' => ['string', 'min:6', 'max:255', 'nullable'],
            'role' => ['integer']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'uuid' => $this->route('user')
        ]);
    }
}
