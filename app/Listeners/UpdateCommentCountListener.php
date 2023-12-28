<?php

namespace App\Listeners;

use App\Contracts\CommentHandler;
use App\Contracts\Repository\ProductRepository;
use App\Events\CommentCreatedEvent;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCommentCountListener
{
    /**
     * Create the event listener.
     */
    public function __construct(public CommentHandler $commentHandler)
    {
    }

    /**
     * Handle the event.
     */
    public function handle(CommentCreatedEvent $event): void
    {
        $this->commentHandler->plusCommentCount($event->productTitle);
    }
}
