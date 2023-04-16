<?php


namespace App\Domain\Contracts\Interactor\Admin;


use App\Domain\DTO\Admin\Region\CreateRegionDTO;
use App\Domain\Entity\Region;

/**
 * Interface RegionInteractorAdminContract
 * @package App\Domain\Contracts\Interactor\Admin
 */
interface RegionInteractorAdminContract
{
    /**
     * @param CreateRegionDTO $dto
     * @return Region
     */
    public function addRegion(CreateRegionDTO $dto): Region;
}
