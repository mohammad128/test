<?php

namespace App\Contracts;

interface CommentHandler
{
    public function plusCommentCount(string $productTitle);
}
