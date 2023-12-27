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
        return [
            'title' => ['required', 'string', 'max:50', 'min:3', 'unique:posts'],
            'text' => ['required', 'string', 'max:50', 'min:10', 'unique:posts'],
        ];
    }
}
