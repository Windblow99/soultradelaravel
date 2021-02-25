<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin', 'external']);
        });

        Gate::define('edit-users', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('manage-profile', function($user){
            return $user->hasAnyRoles(['user', 'medical', 'external']);
        });

        Gate::define('user-only', function($user){
            return $user->hasRole('user');
        });

        Gate::define('approved-only', function($user){
            return $user->isApproved();
        });

        Gate::define('medical-function', function($user){
            return $user->hasAnyRoles(['user', 'medical']);
        });

        Gate::define('medical-user', function($user){
            return $user->hasAnyRoles(['user', 'medical']);
        });

        Gate::define('not-approved', function($user){
            return $user->isNotApproved();
        });

        Gate::define('admin-only', function($user){
            return $user->hasRole('admin');
        });
    }
}
