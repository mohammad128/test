<?php

namespace App\Repositories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class CommentRepository extends BaseRepository implements \App\Contracts\Repository\CommentRepository
{
    public function getModel(): Model
    {
        return app(Comment::class);
    }
}
