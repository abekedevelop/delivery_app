<?php


namespace App\Domain\Contracts\Interactor\Admin;


use Illuminate\Database\Eloquent\Collection;

/**
 * Interface OrderInteractorAdminContract
 * @package App\Domain\Contracts\Interactor\Admin
 */
interface OrderInteractorAdminContract
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;
}
