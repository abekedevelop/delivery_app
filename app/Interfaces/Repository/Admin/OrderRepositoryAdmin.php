<?php


namespace App\Interfaces\Repository\Admin;


use App\Domain\Contracts\Repository\Admin\OrderRepositoryAdminContract;
use App\Domain\Entity\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepositoryAdmin implements OrderRepositoryAdminContract
{
    public function getOrders(): Collection
    {
        return Order::whereNull(Order::PARENT_ID_FIELD)
            ->with('children')
            ->get();
    }
}
