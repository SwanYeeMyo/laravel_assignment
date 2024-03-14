<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDataRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'slug' => [
                'required',
                'string',
                Rule::unique('articles')->ignore($this->route('article')) // Assuming route model binding
            ],  
            'image' => ['image', 'mimes:jpeg,png,gif,svg'],
            'context' => ['required', 'string'],
            'excerpt' => ['required', 'string']

        ];
    }
}
