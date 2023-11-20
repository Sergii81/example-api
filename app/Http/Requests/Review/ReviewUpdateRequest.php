<?php

namespace App\Http\Requests\Review;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ReviewUpdateRequest extends FormRequest
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
            'id' => ['required', 'string', 'exists:reviews,id'],
            'icon' => ['sometimes', 'string', 'nullable'],
            'name' => ['sometimes', 'string', 'nullable'],
            'stars' => ['sometimes', 'numeric', 'nullable'],
            'about' => ['sometimes', 'string', 'nullable']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('review')
        ]);
    }
}
