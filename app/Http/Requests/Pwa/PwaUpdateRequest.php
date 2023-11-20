<?php

namespace App\Http\Requests\Pwa;

use App\Rules\PwaSubDomainRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PwaUpdateRequest extends FormRequest
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
            'id' => ['required', 'integer', 'exists:apps,id'],
            //'domain_id' => ['bail', 'required', 'integer', 'exists:domains,id'],
            'subdomain' => ['sometimes', 'string', 'nullable', /*new PwaSubDomainRule($this->domain_id)*/],
            'geo' => ['sometimes', 'string', 'nullable'],
            'pixel_id' => ['sometimes', 'string', 'nullable'],
            'pixel_key' => ['sometimes', 'string', 'nullable'],
            'link' => ['string', 'nullable'],
            'whitepage' => ['sometimes', 'string', 'nullable'],
            'app_lang' => ['sometimes', 'string', 'nullable'],
            'status' => ['sometimes', 'integer', 'nullable'],
        ];
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('pwa')
        ]);
    }
}
