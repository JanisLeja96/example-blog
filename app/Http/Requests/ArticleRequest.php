<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'content' => ['required'],
            'g-recaptcha-response' => ['required', 'captcha']
        ];
    }
}
