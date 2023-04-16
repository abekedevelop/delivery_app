<?php


namespace App\Domain\UseCase\Admin;


use App\Domain\Contracts\Interactor\Admin\OrderInteractorAdminContract;
use App\Domain\Contracts\Repository\Admin\OrderRepositoryAdminContract;
use App\Domain\Entity\Order;
use App\Domain\Exceptions\IncompatibleOrderException;
use Illuminate\Database\Eloquent\Collection;

class OrderInteractorAdmin implements OrderInteractorAdminContract
{
    /** @var OrderRepositoryAdminContract $orderRepository*/
    private $orderRepository;
    public function __construct(OrderRepositoryAdminContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->orderRepository->getOrders();
    }

    /**
     * @param array $orderIds
     * @return Order
     * @throws IncompatibleOrderException
     */
    public function combine(array $orderIds): Order
    {
        $orders = $this->orderRepository->getByIds($orderIds);
        if (!$orders->count() || $orders->count() != count($orderIds)) {
            throw new IncompatibleOrderException();
        }

        $fromIds = $orders->unique(Order::FROM_REGION_ID_FIELD)->pluck(Order::FROM_REGION_ID_FIELD)->toArray();
        $toIds = $orders->unique(Order::TO_REGION_ID_FIELD)->pluck(Order::TO_REGION_ID_FIELD)->toArray();
        $dates = $orders->unique(Order::DELIVERY_DATE_FIELD)->pluck(Order::DELIVERY_DATE_FIELD)->toArray();

        if (count($fromIds) > 1 || count($toIds) > 1 || count($dates) > 1) {
            throw new IncompatibleOrderException();
        }
        $order = $this->orderRepository->combineOrders($orderIds);

        return $order;
    }

    public function decline(int $orderId)
    {
        $this->orderRepository->decline($orderId);
    }
}
