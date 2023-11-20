<?php

namespace App\Http\Requests\Pwa;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GetBuyerPwaRequest extends FormRequest
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
            'ownerId' => ['required', 'exists:members,uuid'],
            'page' => ['integer', 'nullable'],
            'perPage' => ['integer'. 'nullable']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'ownerId' => $this->route('buyer')
        ]);
    }
}
