<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'title.id' => 'required|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'detail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description.id' => 'required|string',
            'description.en' => 'nullable|string',
            'features' => 'nullable|array',
            'features.id' => 'nullable|array',
            'features.id.*' => 'nullable|string',
            'features.en' => 'nullable|array',
            'features.en.*' => 'nullable|string',
            'price' => 'nullable|string|max:255',
        ];
    }
}
