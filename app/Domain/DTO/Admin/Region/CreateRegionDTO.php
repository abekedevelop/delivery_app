<?php


namespace App\Domain\DTO\Admin\Region;


use App\Domain\DTO\DataTransferObject;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CreateRegionDTO extends DataTransferObject
{
    /** @var string $name */
    public $name;
    public static function fromRequest(Request $request)
    {
        return new self([
            'name' => Arr::get($request->toArray(), 'name')
        ]);
    }
}
