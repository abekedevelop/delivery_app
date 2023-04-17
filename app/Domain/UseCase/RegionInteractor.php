<?php


namespace App\Domain\UseCase;


use App\Domain\Contracts\Interactor\RegionInteractorContract;
use App\Domain\Contracts\Repository\RegionRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class RegionInteractor implements RegionInteractorContract
{
    /** @var RegionRepositoryContract $repository */
    private $repository;

    public function __construct(RegionRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function getRegions(): Collection
    {
        return $this->repository->getRegions();
    }
}
