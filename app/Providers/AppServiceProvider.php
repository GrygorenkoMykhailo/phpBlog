<?php

namespace App\Providers;

use App\Policies\UserPolicy;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepository;
use App\Repositories\PostRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(): void
    {
        $this->app->singleton(UserRepository::class, function($app)
        {
            return new UserRepository();
        });
        $this->app->singleton(PostRepository::class, function($app)
        {
            return new PostRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
