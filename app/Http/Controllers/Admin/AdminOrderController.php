<?php


namespace App\Http\Controllers\Admin;


use App\Domain\Contracts\Interactor\Admin\OrderInteractorAdminContract;
use App\Domain\UseCase\OrderInteractor;
use App\Http\Resources\OrderAdminResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminOrderController
{
    /** @var OrderInteractor $orderInteractor */
    public $orderInteractor;
    public function __construct(OrderInteractorAdminContract $orderInteractor)
    {
        $this->orderInteractor = $orderInteractor;
    }

    public function getOrders(Request $request)
    {
        try {
            $orders = $this->orderInteractor->getAll();
        } catch (\Exception $e) {
            return response()->json([
                Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Error on server'
            ]);
        }

        return OrderAdminResource::collection($orders);
    }
}
