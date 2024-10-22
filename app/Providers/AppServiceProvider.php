<?php

namespace App\Providers;

use App\Interfaces\CategoryInterface;
use App\Models\Admin\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(
            '*',
            function ($view) {
                $categoriesmenu = Category::with('subCategory')->where('status', 1)->get();
                // dd($categories);
                $view->with('categoriesmenu', $categoriesmenu);
            }
        );
    }
}
