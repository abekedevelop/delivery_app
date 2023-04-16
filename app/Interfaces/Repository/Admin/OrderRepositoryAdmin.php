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

    public function combineOrders(array $orderIds): Order
    {
        $orders = $this->getByIds($orderIds);
        $fOrder = $orders->first();
        $attrs = [
            Order::USER_ID_FIELD => request()->user()->id,
            Order::FROM_REGION_ID_FIELD => $fOrder->{Order::FROM_REGION_ID_FIELD},
            Order::TO_REGION_ID_FIELD => $fOrder->{Order::TO_REGION_ID_FIELD},
            Order::DELIVERY_DATE_FIELD => $fOrder->{Order::DELIVERY_DATE_FIELD},
            Order::STATUS_FIELD => ORDER::ORDER_STATUS_ACTIVE,
        ];

        $newOrder = Order::create($attrs);
        Order::whereIn(Order::ORDER_ID_FIELD, $orderIds)->update([
            Order::PARENT_ID_FIELD => $newOrder->{Order::ORDER_ID_FIELD}
        ]);

        return $newOrder;
    }

    public function getByIds(array $orderIDs): Collection
    {
        return Order::whereIn(Order::ORDER_ID_FIELD, $orderIDs)
            ->whereNull(Order::PARENT_ID_FIELD)
            ->where(Order::STATUS_FIELD, Order::ORDER_STATUS_ACTIVE)
            ->get();
    }

    public function decline(int $orderID)
    {
        return Order::where(Order::ORDER_ID_FIELD, $orderID)->update([
            Order::STATUS_FIELD => Order::ORDER_STATUS_DECLINED_BY_ADMIN
        ]);
    }

}
