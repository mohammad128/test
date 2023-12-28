<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'user_id',
        'product_id',
        'body',
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class,'product_id', 'id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(Product::class,'user_id', 'id');
    }
}
