<?php

namespace App\Providers;

use App\Models\{Category};

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $category = new Category();
        view()->composer(
                [
                    'articles.create',
                    'articles.edit'
                ], function($view) use ($category)
                {
                    $view->with(
                        [
                            'categories' => $category->getAllCategories()
                        ]
                    );
                }
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
