<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Blade;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->registerPolicies();
        Gate::define('ADMIN', function(User $users){
            return $users->status === 'ADMIN';
        });

        Gate::define('PGS', function(User $users){
            return $users->status === 'PGS';
        });

        Gate::define('HR', function(User $users){
            return $users->status === 'HR';
        });

        Gate::define('HR HEAD', function(User $users){
            return $users->status === 'HR HEAD';
        });

        Gate::define('GA HEAD', function(User $users){
            return $users->status === 'GA HEAD';
        });

        Gate::define('CMA', function(User $users){
            return $users->status === 'CMA';
        });
        //
    }
}
