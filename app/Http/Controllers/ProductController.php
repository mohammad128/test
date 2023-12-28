<?php

namespace App\Http\Controllers;

use App\Contracts\Repository\ProductRepository;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(public readonly ProductRepository $productRepository)
    {
    }

    public function index(): ProductCollection
    {
        return ProductCollection::make(
            $this->productRepository->all(['comments'])
        );
    }
}
