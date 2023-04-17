<?php


namespace App\Domain\Contracts\Repository;


use Illuminate\Database\Eloquent\Collection;

interface RegionRepositoryContract
{
    /**
     * @return Collection
     */
    public function getRegions(): Collection;
}
