<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository implements \App\Contracts\Repository\ProductRepository
{
    public function getModel(): Model
    {
        return app(Product::class);
    }

    public function findByTitle($title, ?array $with = []): ?Model
    {
        return $this->getModel()::query()
            ->where('title', $title)
            ->with($with)
            ->first();
    }

    public function all(?array $with = []): Collection
    {
        return $this->getModel()::with($with)->get();
    }
}
