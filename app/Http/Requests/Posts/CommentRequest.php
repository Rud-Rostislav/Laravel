<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'comment' => ['string', 'max:200', 'min:5', 'required', 'unique:App\Models\Comment,comment'],
        ];
    }
}
