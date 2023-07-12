<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Todo\TodoRepositoryInterface;
use App\Repositories\Todo\TodoRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 依存性注入
        $this->app->bind(TodoRepositoryInterface::class, TodoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
