<?php


namespace App\Interfaces\Repository;


use App\Domain\Contracts\Repository\OrderRepositoryContract;
use App\Domain\DTO\Order\CreateOrderDTO;
use App\Domain\Entity\Order;

class OrderRepository implements OrderRepositoryContract
{
    public function create(CreateOrderDTO $dto): Order
    {
        $attrs = [
            Order::USER_ID_FIELD => $dto->userID,
            Order::FROM_REGION_ID_FIELD => $dto->fromRegionID,
            Order::TO_REGION_ID_FIELD => $dto->toRegionID,
            Order::DELIVERY_DATE_FIELD => $dto->deliveryDate,
        ];

        return Order::create($attrs);
    }

    public function getByID(int $id): Order
    {
        $o = Order::with('fromCity', 'toCity')->first($id);
        var_dump($o->fromCity);
        return new Order();
    }
}
