<?php


namespace App\Http\Controllers;


use App\Domain\Contracts\Interactor\OrderInteractorContract;
use App\Domain\DTO\Order\CreateOrderDTO;
use App\Domain\Entity\Order;
use App\Http\Resources\OrderResource;
use App\Validators\BaseValidator;
use App\Validators\Order\CreateOrderValidator;
use Illuminate\Http\Request;

class OrderController
{
    private $orderInteractor;
    public function __construct(OrderInteractorContract $orderInteractor)
    {
        $this->orderInteractor = $orderInteractor;
    }

    public function create(Request $request)
    {
        /** @var BaseValidator $validator */
        $validator = app()->make(CreateOrderValidator::class);
        $validator->validate($request);
        try {
            /** @var Order|null $order */
            $order = $this->orderInteractor->create(CreateOrderDTO::fromRequest($request));
        } catch (\Exception $e) {
            var_dump($e);
        }

        return new OrderResource($order);
    }
}
