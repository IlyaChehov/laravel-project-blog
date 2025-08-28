<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('frontend.layouts.components.sidebar', function(\Illuminate\View\View $view) {
            $view->with('popularPosts', Post::query()->orderBy('views', 'desc')->limit(3)->get());
            $view->with('categories', Category::query()->withCount('posts')->get());
        });
    }
}
