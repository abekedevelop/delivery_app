<?php

namespace App\Http\Resources;

use App\Domain\Entity\Region;
use Illuminate\Http\Resources\Json\JsonResource;

class RegionAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var Region $model */
        $model = $this->resource;

        return [
            'id' => $model->{Region::REGION_ID_FIELD},
            'name' => $model->{Region::REGION_NAME_FIELD},
        ];
    }
}
