<?php


namespace App\Domain\Contracts\Repository\Admin;


use Illuminate\Database\Eloquent\Collection;

/**
 * Interface OrderRepositoryAdminContract
 * @package App\Domain\Contracts\Repository\Admin
 */
interface OrderRepositoryAdminContract
{
    /**
     * @return Collection
     */
    public function getOrders(): Collection;
}
