<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $title
 */
class Product extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'title',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
