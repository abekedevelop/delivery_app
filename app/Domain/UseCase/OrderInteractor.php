<?php


namespace App\Domain\UseCase;


use App\Domain\Contracts\Interactor\OrderInteractorContract;
use App\Domain\Contracts\Repository\OrderRepositoryContract;
use App\Domain\DTO\Order\CreateOrderDTO;
use App\Domain\Entity\Order;

class OrderInteractor implements OrderInteractorContract
{
    /** @var OrderRepositoryContract $orderRepository */
    private $orderRepository;

    public function __construct(OrderRepositoryContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    public function create(CreateOrderDTO $dto): Order
    {
        return $this->orderRepository->create($dto);
    }
}
