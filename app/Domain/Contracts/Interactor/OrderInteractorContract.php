<?php


namespace App\Domain\Contracts\Interactor;


use App\Domain\DTO\Order\CreateOrderDTO;
use App\Domain\Entity\Order;

interface OrderInteractorContract
{
    public function create(CreateOrderDTO $dto): Order;
}
