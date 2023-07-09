<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('currency', function ( $expression )
        { return "<?php echo number_format($expression,0,',','.'); ?>"; });

        Blade::directive('currencyIDRToNumeric', function ( $expression )
        { return "<?php echo preg_replace('/\D/', '', $expression) ?>"; });





        Paginator::useBootstrap();
    }
}
