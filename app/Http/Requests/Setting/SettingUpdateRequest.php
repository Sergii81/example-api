<?php

namespace App\Http\Requests\Setting;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'id' => ['required', 'integer', 'exists:settings,id'],
            'app_name' => ['sometimes', 'string', 'nullable'],
            'app_author' => ['sometimes', 'string', 'nullable'],
            'app_icon' => ['sometimes', 'string', 'nullable'],
            'image_set' => ['sometimes', 'string', 'nullable'],
            'app_rating' => ['sometimes', 'numeric', 'nullable'],
            'fb_continue' => ['sometimes', 'string', 'nullable'],
            'about' => ['sometimes', 'string', 'nullable'],
            'app_icon_file' => ['sometimes', 'string', 'nullable'],
            'image_set_files' => ['sometimes', 'array', 'nullable'],
            'image_set_file_names' => ['sometimes', 'array', 'nullable']
        ];
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('setting')
        ]);
    }
}
