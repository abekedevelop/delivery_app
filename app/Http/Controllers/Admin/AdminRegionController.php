<?php


namespace App\Http\Controllers\Admin;


use App\Domain\Contracts\Interactor\Admin\RegionInteractorAdminContract;
use App\Domain\DTO\Admin\Region\CreateRegionDTO;
use App\Http\Resources\RegionAdminResource;
use App\Validators\Admin\Region\RegionCreateValidator;
use App\Validators\BaseValidator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminRegionController
{
    /** @var RegionInteractorAdminContract $regionInteractor */
    public $regionInteractor;

    public function __construct(RegionInteractorAdminContract $regionInteractor)
    {
        $this->regionInteractor = $regionInteractor;
    }

    public function createRegion(Request $request)
    {
        /** @var BaseValidator $validator */
        $validator = app()->make(RegionCreateValidator::class);
        $validator->validate($request);

        try {
            $region = $this->regionInteractor->addRegion(CreateRegionDTO::fromRequest($request));
        } catch (\Exception $e) {
            return response()->json([
                Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Error on server'
            ]);
        }

        return new RegionAdminResource($region);
    }
}
