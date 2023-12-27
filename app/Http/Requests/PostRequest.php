<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:50', 'min:3'],
            'text' => ['required', 'string', 'max:500', 'min:1'],
        ];

        if ($this->getMethod() === 'POST') {
            $rules['title'][] = 'unique:posts';
            $rules['text'][] = 'unique:posts';
        }

        return $rules;
    }
}
