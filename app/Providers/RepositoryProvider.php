<?php


namespace App\Providers;


use App\Domain\Contracts\Repository\Admin\OrderRepositoryAdminContract;
use App\Domain\Contracts\Repository\Admin\RegionRepositoryAdminContract;
use App\Domain\Contracts\Repository\Admin\UserRepositoryAdminContract;
use App\Domain\Contracts\Repository\OrderRepositoryContract;
use App\Domain\Contracts\Repository\UserRepositoryContract;
use App\Interfaces\Repository\Admin\OrderRepositoryAdmin;
use App\Interfaces\Repository\Admin\RegionRepositoryAdmin;
use App\Interfaces\Repository\Admin\UserRepositoryAdmin;
use App\Interfaces\Repository\OrderRepository;
use App\Interfaces\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    final public function register()
    {
        $this->bindUserRepository();
        $this->bindOrderRepository();
        /** admin repo's */
        $this->bindAdminUserRepository();
        $this->bindAdminOrderRepository();
        $this->bindAdminRegionRepository();
    }

    final public function bindUserRepository(): void {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
    }

    final public function bindOrderRepository(): void {
        $this->app->bind(OrderRepositoryContract::class, OrderRepository::class);
    }

    final public function bindAdminUserRepository(): void {
        $this->app->bind(UserRepositoryAdminContract::class, UserRepositoryAdmin::class);
    }

    final public function bindAdminOrderRepository(): void {
        $this->app->bind(OrderRepositoryAdminContract::class, OrderRepositoryAdmin::class);
    }

    final public function bindAdminRegionRepository(): void {
        $this->app->bind(RegionRepositoryAdminContract::class, RegionRepositoryAdmin::class);
    }
}
