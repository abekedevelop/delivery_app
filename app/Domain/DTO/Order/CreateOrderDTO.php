<?php


namespace App\Domain\DTO\Order;


use App\Domain\DTO\DataTransferObject;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CreateOrderDTO extends DataTransferObject
{
    /** @var int $userID */
    public $userID;
    /** @var int $fromRegionID */
    public $fromRegionID;
    /** @var int $toRegionID */
    public $toRegionID;
    /** @var string */
    public $deliveryDate;

    public static function fromRequest(Request $request)
    {
        return new self([
            'userID' => Auth::user()->getAuthIdentifier(),
            'fromRegionID' => Arr::get($request->toArray(), 'fromRegionID'),
            'toRegionID' => Arr::get($request->toArray(), 'toRegionID'),
            'deliveryDate' => Arr::get($request->toArray(), 'deliveryDate'),
        ]);
    }
}
