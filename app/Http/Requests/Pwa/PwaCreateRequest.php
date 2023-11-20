<?php

namespace App\Http\Requests\Pwa;

use App\Rules\PwaSubDomainRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PwaCreateRequest extends FormRequest
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
            'domain_id' => ['bail', 'required', 'integer', 'exists:domains,id'],
            'subdomain' => ['bail', 'required', 'string', new PwaSubDomainRule($this->domain_id)],
            'owner_id' => ['bail', 'required', 'exists:members,uuid'],
            'geo' => ['bail', 'required', 'string'],
            'pixel_id' => ['sometimes', 'string', 'nullable'],
            'pixel_key' => ['sometimes', 'string', 'nullable'],
            'link' => ['string', 'nullable'],
            'template' => ['required'],
            'whitepage' => ['required', 'string'],
            'app_lang' => ['string', 'nullable']
        ];
    }
}
