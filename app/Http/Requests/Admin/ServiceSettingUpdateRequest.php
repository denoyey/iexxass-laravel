<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiceSettingUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subtitle.id' => 'nullable|string|max:255',
            'subtitle.en' => 'nullable|string|max:255',
            'title.id' => 'nullable|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'quote_title.id' => 'nullable|string|max:1000',
            'quote_title.en' => 'nullable|string|max:1000',
            'quote_subtitle.id' => 'nullable|string|max:255',
            'quote_subtitle.en' => 'nullable|string|max:255',
        ];
    }
}
