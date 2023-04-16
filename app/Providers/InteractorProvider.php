<?php


namespace App\Providers;


use App\Domain\Contracts\Interactor\Admin\OrderInteractorAdminContract;
use App\Domain\Contracts\Interactor\Admin\UserInteractorAdminContract;
use App\Domain\Contracts\Interactor\AuthInteractorContract;
use App\Domain\Contracts\Interactor\OrderInteractorContract;
use App\Domain\Contracts\Interactor\UserInteractorContract;
use App\Domain\UseCase\Admin\OrderInteractorAdmin;
use App\Domain\UseCase\Admin\UserInteractorAdmin;
use App\Domain\UseCase\AuthInteractor;
use App\Domain\UseCase\OrderInteractor;
use App\Domain\UseCase\UserInteractor;
use Carbon\Laravel\ServiceProvider;

class InteractorProvider extends ServiceProvider
{
    final public function register()
    {
        $this->bindAuthInteractor();
        $this->bindUserInteractor();
        $this->bindOrderInteractor();
        /** Admin interactors */
        $this->bindUserAdminInteractor();
        $this->bindOrderAdminInteractor();
    }

    final public function bindAuthInteractor(): void {
        $this->app->bind(AuthInteractorContract::class, AuthInteractor::class);
    }

    final public function bindUserInteractor(): void {
        $this->app->bind(UserInteractorContract::class, UserInteractor::class);
    }

    final public function bindOrderInteractor(): void {
        $this->app->bind(OrderInteractorContract::class, OrderInteractor::class);
    }

    final public function bindUserAdminInteractor(): void {
        $this->app->bind(UserInteractorAdminContract::class, UserInteractorAdmin::class);
    }

    final public function bindOrderAdminInteractor(): void {
        $this->app->bind(OrderInteractorAdminContract::class, OrderInteractorAdmin::class);
    }
}
