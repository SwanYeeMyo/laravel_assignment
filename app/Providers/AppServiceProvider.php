<?php

namespace App\Providers;

use App\Http\Repositories\Employee\EmployeeRepositoryInterface;
use App\Http\Repositories\Employee\EmployeeRepository;
use App\Http\Repositories\Permission\PermissionRepository;
use App\Http\Repositories\Permission\PermissionRepositoryInterface;
use App\Http\Repositories\Role\RoleRepository;
use App\Http\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(PermissionRepositoryInterface::class,PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class,EmployeeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
