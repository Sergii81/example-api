<?php

namespace App\Http\Requests\Domain;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DomainUpdateRequest extends FormRequest
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
            'id' => ['bail', 'required', 'integer', 'exists:domains,id'],
            'domain' => ['sometimes', 'string', 'nullable'],
            'status' => ['sometimes', 'integer', 'nullable']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('domain')
        ]);
    }
}
