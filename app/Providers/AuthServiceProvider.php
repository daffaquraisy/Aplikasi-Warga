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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function ($user) {
            return count(array_intersect(["ADMIN"], json_decode($user->roles)));
        });

        Gate::define('manage-informations', function ($user) {
            return count(array_intersect(["ADMIN"], json_decode($user->roles)));
        });

        Gate::define('manage-patriarches', function ($user) {
            return count(array_intersect(["ADMIN"], json_decode($user->roles)));
        });

        Gate::define('manage-residents', function ($user) {
            return count(array_intersect(["ADMIN"], json_decode($user->roles)));
        });

        Gate::define('see-rt1', function ($user) {
            return count(array_intersect(["ADMIN", "Pak RT 1"], json_decode($user->roles)));
        });

        Gate::define('see-rt2', function ($user) {
            return count(array_intersect(["ADMIN", "Pak RT 2"], json_decode($user->roles)));
        });

        Gate::define('see-rt3', function ($user) {
            return count(array_intersect(["ADMIN", "Pak RT 3"], json_decode($user->roles)));
        });

        Gate::define('see-rt4', function ($user) {
            return count(array_intersect(["ADMIN", "Pak RT 4"], json_decode($user->roles)));
        });

        Gate::define('see-rt5', function ($user) {
            return count(array_intersect(["ADMIN", "Pak RT 5"], json_decode($user->roles)));
        });

        Gate::define('see-rt6', function ($user) {
            return count(array_intersect(["ADMIN", "Pak RT 6"], json_decode($user->roles)));
        });

        Gate::define('see-rt7', function ($user) {
            return count(array_intersect(["ADMIN", "Pak RT 7"], json_decode($user->roles)));
        });
    }
}
