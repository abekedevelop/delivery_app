<?php


namespace App\Domain\UseCase\Admin;


use App\Domain\Contracts\Interactor\Admin\RegionInteractorAdminContract;
use App\Domain\Contracts\Repository\Admin\RegionRepositoryAdminContract;
use App\Domain\DTO\Admin\Region\CreateRegionDTO;
use App\Domain\Entity\Region;

class RegionInteractorAdmin implements RegionInteractorAdminContract
{
    /** @var RegionRepositoryAdminContract $regionRepository */
    public $regionRepository;

    public function __construct(RegionRepositoryAdminContract $regionRepository)
    {
        $this->regionRepository = $regionRepository;
    }

    public function addRegion(CreateRegionDTO $dto): Region
    {
        return $this->regionRepository->create($dto);
    }
}
