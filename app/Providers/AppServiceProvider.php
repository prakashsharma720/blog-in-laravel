<?php

namespace App\Providers;

use App\Models\{Category, Post};
use App\Observers\PostObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $categories = Category::all();
        View::composer('*', function ($view) use ($categories) {
            $view->with('categories', $categories);
        });
        
        Post::observe(PostObserver::class);

    }
}
