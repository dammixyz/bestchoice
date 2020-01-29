<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $movies = DB::table('movies')->skip(0)->take(8)->orderBy('id', 'desc')->get();
        View::share('movies', $movies);
        $categories = DB::table('categories')->get();
        View::share('categories', $categories);
        $genres = DB::table('genres')->get();
        View::share('genres', $genres);
    }
}
