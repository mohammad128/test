<?php

namespace App\Http\Requests;

use App\Rules\LimitUserComment;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "product_title" => [
                new LimitUserComment(maxCommentCount: config('settings.parspack.limit_comment'))
            ],
            "body" => [
                'required',
                'max:1024'
            ]
        ];
    }

    public function getProductTitle(): mixed
    {
        return $this->get('product_title');
    }
    public function getBody(): mixed
    {
        return $this->get('body');
    }

}
