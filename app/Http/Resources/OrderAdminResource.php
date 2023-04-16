<?php

namespace App\Http\Resources;

use App\Domain\Entity\Order;
use App\Domain\Entity\Region;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        /** @var Order $model */
        $model = $this->resource;

        $result = [
            'id' => $model->{Order::ORDER_ID_FIELD},
            'fromID' =>  $model->{Order::FROM_REGION_ID_FIELD},
            'fromName' => optional($model->fromCity)->{Region::REGION_NAME_FIELD},
            'toID' => $model->{Order::TO_REGION_ID_FIELD},
            'toName' => optional($model->toCity)->{Region::REGION_NAME_FIELD},
            'deliveryDate' => $model->{Order::DELIVERY_DATE_FIELD},
            'status' => $model->{Order::STATUS_FIELD},
            'statusName' => $model->getStatusName(),
        ];

        if ($model->children) {
            foreach ($this->children as $child) {
                $result['children'][] = [
                    'id' => $child->{Order::ORDER_ID_FIELD},
                    'userID' => $child->{Order::USER_ID_FIELD},
                    'fromID' =>  $child->{Order::FROM_REGION_ID_FIELD},
                    'fromName' => optional($child->fromCity)->{Region::REGION_NAME_FIELD},
                    'toID' => $child->{Order::TO_REGION_ID_FIELD},
                    'toName' => optional($child->toCity)->{Region::REGION_NAME_FIELD},
                    'deliveryDate' => $child->{Order::DELIVERY_DATE_FIELD},
                    'status' => $child->{Order::STATUS_FIELD},
                    'statusName' => $child->getStatusName(),
                ];
            }
        }

        return $result;
    }
}
