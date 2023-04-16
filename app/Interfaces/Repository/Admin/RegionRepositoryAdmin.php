<?php


namespace App\Interfaces\Repository\Admin;


use App\Domain\Contracts\Repository\Admin\RegionRepositoryAdminContract;
use App\Domain\DTO\Admin\Region\CreateRegionDTO;
use App\Domain\Entity\Region;

class RegionRepositoryAdmin implements RegionRepositoryAdminContract
{
    public function create(CreateRegionDTO $dto): Region
    {
        return Region::create([
            Region::REGION_NAME_FIELD => $dto->name
        ]);
    }
}
