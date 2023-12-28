<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements \App\Contracts\Repository\UserRepository
{
    public function getModel(): Model
    {
        return app(User::class);
    }
}
