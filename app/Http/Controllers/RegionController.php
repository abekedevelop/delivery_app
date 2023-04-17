<?php


namespace App\Http\Controllers;


use App\Domain\Contracts\Interactor\RegionInteractorContract;
use App\Http\Resources\RegionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegionController
{
    /** @var RegionInteractorContract $regionInteractor */
    private $regionInteractor;

    public function __construct(RegionInteractorContract $regionInteractor)
    {
        $this->regionInteractor = $regionInteractor;
    }

    public function getRegions(Request $request)
    {
        try {
            $regions = $this->regionInteractor->getRegions();
        } catch (\Exception $e) {
            return response()->json([
                Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Error on server'
            ]);
        }

        return RegionResource::collection($regions);
    }
}
