<?php


namespace App\Domain\Contracts\Interactor;


use Illuminate\Database\Eloquent\Collection;

/**
 * Interface RegionInteractorContract
 * @package App\Domain\Contracts\Interactor
 */
interface RegionInteractorContract
{
    /**
     * @return Collection
     */
    public function getRegions(): Collection;
}
