<?php

namespace App\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'section_id' => 'required|integer|exists:sections,id',
            'parent_id' => 'nullable|integer|exists:branches,id',
            'title' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title field is required',
            'section_id.required' => 'section id is required',
        ];
    }
}
