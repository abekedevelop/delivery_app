<?php


namespace App\Domain\UseCase;


use App\Domain\Contracts\Repository\UserRepositoryContract;
use App\Domain\DTO\User\RegisterDTO;
use App\Domain\Entity\User;
use App\Domain\Contracts\Interactor\UserInteractorContract ;
use Illuminate\Support\Facades\Hash;

class UserInteractor implements UserInteractorContract
{
    /** @var UserRepositoryContract $userRepository */
    private $userRepository;
    public function __construct(
        UserRepositoryContract $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterDTO $dto): ?User
    {
        // TODO move hash logic
        $dto->password = Hash::make($dto->password, [
            'rounds' => 12,
        ]);
        try {
            $user = $this->userRepository->create($dto);
        } catch (\Exception $e) {
            return null;
        }

        return $user;
    }
}
