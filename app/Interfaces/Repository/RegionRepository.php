<?php


namespace App\Interfaces\Repository;


use App\Domain\Contracts\Repository\RegionRepositoryContract;
use App\Domain\Entity\Region;
use Illuminate\Database\Eloquent\Collection;

class RegionRepository implements RegionRepositoryContract
{
    public function getRegions(): Collection
    {
        return Region::all();
    }
}
