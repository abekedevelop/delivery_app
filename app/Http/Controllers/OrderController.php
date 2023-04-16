<?php


namespace App\Http\Controllers;


use App\Domain\Contracts\Interactor\OrderInteractorContract;
use App\Domain\DTO\Order\CreateOrderDTO;
use App\Domain\Entity\Order;
use App\Http\Resources\OrderResource;
use App\Validators\BaseValidator;
use App\Validators\Order\CreateOrderValidator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            return response()->json([
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Error on server. Try later'
            ]);
        }

        return new OrderResource($order);
    }
}
