<?php

namespace App\Providers;

use App\Contracts\CommentHandler;
use App\Contracts\Repository as Contracts;
use App\Services\LinuxCommand;
use Illuminate\Support\ServiceProvider;
use App\Repositories as Repositories;

class RepositoryServiceProvider extends ServiceProvider
{

    public array $bindings = [
        Contracts\UserRepository::class => Repositories\UserRepository::class,
        Contracts\ProductRepository::class => Repositories\ProductRepository::class,
        Contracts\CommentRepository::class => Repositories\CommentRepository::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
