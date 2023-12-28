<?php

namespace App\Http\Controllers;

use App\Contracts\Repository\CommentRepository;
use App\Contracts\Repository\ProductRepository;
use App\Events\CommentCreatedEvent;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(
        public readonly CommentRepository $commentRepository,
        public readonly ProductRepository $productRepository,
    )
    {
    }

    public function store(CommentRequest $request): CommentResource
    {
        /** @var Product  $product*/
        $product = $this->productRepository->findByTitle($request->getProductTitle());
        if(empty($product))
            $product = $this->productRepository->create(['title' => $request->getProductTitle()]);

        /** @var $comment $comment */
        $comment = $product->comments()->create([
            "user_id" => auth()->user()->id,
            "body" => $request->getBody()
        ]);

        event(new CommentCreatedEvent($product->title));
        return CommentResource::make(
            $comment
        );
    }
}
