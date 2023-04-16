<?php


namespace App\Http\Controllers\Admin;


use App\Domain\Contracts\Interactor\Admin\OrderInteractorAdminContract;
use App\Domain\Exceptions\IncompatibleOrderException;
use App\Domain\UseCase\OrderInteractor;
use App\Http\Resources\OrderAdminResource;
use App\Validators\Admin\Order\OrderCombineValidator;
use App\Validators\Admin\Order\OrderDeclineValidator;
use App\Validators\BaseValidator;
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

    public function declineOrder(Request $request)
    {
        /** @var BaseValidator $validator */
        $validator = app()->make(OrderDeclineValidator::class);
        $validator->validate($request);
        try {
            $this->orderInteractor->decline($request->get('orderId'));
        } catch (\Exception $e) {
            return response()->json([
                Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Error on server'
            ]);
        }

        return response()->json([
            'statusCode' => Response::HTTP_OK,
            'message' => 'Заявка отклонена'
        ]);
    }

    public function combineOrders(Request $request)
    {
        /** @var BaseValidator $validator */
        $validator = app()->make(OrderCombineValidator::class);
        $validator->validate($request);
        try {
            $newOrder = $this->orderInteractor->combine($request->get('orderIds'));
        }  catch (IncompatibleOrderException $e) {
            return response()->json([
                'statusCode' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'Orders cannot be grouped'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Error on server'
            ]);
        }

        return new OrderAdminResource($newOrder);
    }
}
