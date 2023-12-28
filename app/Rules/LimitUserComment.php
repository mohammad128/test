<?php

namespace App\Rules;

use App\Contracts\Repository\CommentRepository;
use App\Contracts\Repository\ProductRepository;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class LimitUserComment implements ValidationRule
{
    public readonly CommentRepository $commentRepository;
    public readonly ProductRepository $productRepository;
    public function __construct(public $maxCommentCount)
    {
        $this->commentRepository = app(CommentRepository::class);
        $this->productRepository = app(ProductRepository::class);
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(
            $this->getUserCommentCount($value) >= $this->maxCommentCount
        )
            $fail('You cannot submit your comment for this product');
    }

    public function getUserCommentCount(string $productTitle): int
    {
        $result = $this->productRepository->findByTitle($productTitle)?->comments()->where('user_id', auth()->user()?->id)->get()->count();
        return $result ? $result : 0;
    }
}
