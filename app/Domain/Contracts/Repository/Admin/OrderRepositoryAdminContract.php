<?php


namespace App\Domain\Contracts\Repository\Admin;


use App\Domain\Entity\Order;
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

    /**
     * @param array $orderIds
     * @return Order
     */
    public function combineOrders(array $orderIds): Order;

    /**
     * @param array $orderIDs
     * @return Collection
     */
    public function getByIds(array $orderIDs): Collection;

    public function decline(int $orderID);
}
