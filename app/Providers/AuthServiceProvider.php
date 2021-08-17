<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        //action-access
        Gate::define('edit-users', function($user){
            return $user->hasRole('admin');
        });        
        //action-access
        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });

        //route-access
        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin','manager']);
        });        
        
        //route-access
        Gate::define('manage-menus', function($user){
            return $user->hasAnyRoles(['manager']);
        });        
        
        //route-access
        Gate::define('view-menus', function($user){
            return $user->hasAnyRoles(['viewer']);
        });
        
    }
}
