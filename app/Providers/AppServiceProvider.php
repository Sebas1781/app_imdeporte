<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\PageImage;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        View::composer('*', function ($view) {
            try {
                $view->with('pageImages', PageImage::pluck('ruta', 'key'));
            } catch (\Exception $e) {
                $view->with('pageImages', collect());
            }
        });
    }
}
