<?php

namespace App\Providers;

use App\Contracts\CommentHandler;
use App\Support\LinuxCommand;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $commentHandlerFactory = [
        'linux' => LinuxCommand::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CommentHandler::class, $this->commentHandlerFactory[config('settings.parspack.strategy', 'linux')]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
