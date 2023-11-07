<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'title' => 'Title is required',
            'short_content' => 'Description is required',
            'file_url' => 'Image is required',
            'body' => 'Text is required',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:500',
            'short_content' => 'required',
            'file_url' => 'file|mimes:jpg,png,jpeg|max:2048',
            'body' => 'required',
        ];
    }
}
