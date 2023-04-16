<?php


namespace App\Domain\Contracts\Repository\Admin;


use App\Domain\DTO\Admin\Region\CreateRegionDTO;
use App\Domain\Entity\Region;

/**
 * Interface RegionRepositoryAdminContract
 * @package App\Domain\Contracts\Repository\Admin
 */
interface RegionRepositoryAdminContract
{
    /**
     * @param CreateRegionDTO $dto
     * @return Region
     */
    public function create(CreateRegionDTO $dto): Region;
}
