<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Bidang;
use App\Models\FasilitasBidang;
use App\Models\ListFacility;

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
        //
        // Share bidangs globally to all views
        View::share('bidangs', Bidang::all());
        // Share all FasilitasBidang with their related facilities to all views
        View::share('fasilitasBidangs', FasilitasBidang::all());
    }
}
