<?php


namespace App\Providers;


use App\Domain\Contracts\Repository\OrderRepositoryContract;
use App\Domain\Contracts\Repository\UserRepositoryContract;
use App\Interfaces\Repository\OrderRepository;
use App\Interfaces\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    final public function register()
    {
        $this->bindUserRepository();
        $this->bindOrderRepository();
    }

    final public function bindUserRepository(): void {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
    }

    final public function bindOrderRepository(): void {
        $this->app->bind(OrderRepositoryContract::class, OrderRepository::class);
    }
}
