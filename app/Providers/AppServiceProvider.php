<?php

namespace App\Providers;

use App\Observers\EmployeeObserer;
use App\Observers\CompanyObserver;
use App\Models\Company;
use App\Models\Employee;
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
        Employee::observe(EmployeeObserer::class);
        Company::observe(CompanyObserver::class);
    }
}
