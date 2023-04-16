<?php


namespace App\Domain\Contracts\Repository;


use App\Domain\DTO\Order\CreateOrderDTO;
use App\Domain\Entity\Order;

/**
 * Interface OrderRepositoryContract
 * @package App\Domain\Contracts\Repository
 */
interface OrderRepositoryContract
{
    /**
     * @param CreateOrderDTO $dto
     * @return Order
     */
    public function create(CreateOrderDTO $dto): Order;

    /**
     * @param int $id
     * @return Order|null
     */
    public function getByID(int $id): Order;
}
