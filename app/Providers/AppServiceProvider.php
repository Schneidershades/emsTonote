<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Department;
use App\Observers\User\UserObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\Department\DepartmentObserver;

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
        User::observe(UserObserver::class);
        Department::observe(DepartmentObserver::class);
    }
}
