<?php


namespace App\Domain\UseCase\Admin;


use App\Domain\Contracts\Interactor\Admin\OrderInteractorAdminContract;
use App\Domain\Contracts\Repository\Admin\OrderRepositoryAdminContract;
use Illuminate\Database\Eloquent\Collection;

class OrderInteractorAdmin implements OrderInteractorAdminContract
{
    /** @var OrderRepositoryAdminContract $orderRepository*/
    private $orderRepository;
    public function __construct(OrderRepositoryAdminContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAll(): Collection
    {
        return $this->orderRepository->getOrders();
    }
}
