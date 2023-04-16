<?php


namespace App\Domain\UseCase;

use App\Domain\Contracts\Interactor\AuthInteractorContract;
use App\Domain\Contracts\Repository\UserRepositoryContract;
use App\Domain\DTO\User\Login;
use App\Domain\Entity\User;
use Illuminate\Support\Facades\Hash;

class AuthInteractor implements AuthInteractorContract
{
    /** @var UserRepositoryContract $userRepo */
    protected $userRepo;
    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function Authenticate(Login $dto): ?User
    {
        $user = $this->userRepo->getByLogin($dto->login);
        if (!$user) {
            return null;
        }
        if (!Hash::check($dto->password, $user->{User::PASSWORD_FIELD})) {
            return null;
        }

        return $user;
    }
}
