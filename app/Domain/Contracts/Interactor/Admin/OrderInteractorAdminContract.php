<?php


namespace App\Domain\Contracts\Interactor\Admin;


use App\Domain\Entity\Order;
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

    /**
     * @param array $orderIds
     * @return Order
     */
    public function combine(array $orderIds): Order;

    public function decline(int $orderId);
}
