<?php


namespace App\Interfaces\Repository;


use App\Domain\Contracts\Repository\UserRepositoryContract;
use App\Domain\DTO\User\RegisterDTO;
use App\Domain\Entity\Role;
use App\Domain\Entity\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryContract
{
    public function create(RegisterDTO $dto): ?User
    {
        $user = new User();
        $user->{User::LOGIN_FIELD} = $dto->login;
        $user->{User::PASSWORD_FIELD} = $dto->password;
        $user->{User::REGION_ID_FIELD} = $dto->regionId;
        $user->{User::ROLE_FIELD} = Role::ROLE_CLIENT;
        $user->save();

        return $user;
    }

    public function getByLogin(string $login): ?User
    {
        return User::where(User::LOGIN_FIELD, $login)->first();
    }
}
