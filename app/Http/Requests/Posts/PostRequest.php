<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->method() === 'POST') {
            return [
                'title' => ['required', 'string', 'max:50', 'min:3', 'unique:posts'],
                'text' => ['required', 'string', 'max:500', 'min:5', 'unique:posts'],
            ];
        } else {
            return [
                'title' => ['string', 'max:50', 'min:3'],
                'text' => ['string', 'max:500', 'min:5'],
            ];
        }
    }
}
