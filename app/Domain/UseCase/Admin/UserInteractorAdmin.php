<?php


namespace App\Domain\UseCase\Admin;


use App\Domain\Contracts\Interactor\Admin\UserInteractorAdminContract;
use App\Domain\Contracts\Repository\Admin\UserRepositoryAdminContract;
use App\Domain\Entity\User;

/**
 * Class UserInteractorAdmin
 * @package App\Domain\UseCase\Admin
 */
class UserInteractorAdmin implements UserInteractorAdminContract
{
    /**
     * @var UserRepositoryAdminContract $userRepository
     */
    private $userRepository;
    public function __construct(UserRepositoryAdminContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function assignAdmin(int $userID): User
    {
        return $this->userRepository->assignAdmin($userID);
    }
}
