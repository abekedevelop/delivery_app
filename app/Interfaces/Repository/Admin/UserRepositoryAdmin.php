<?php


namespace App\Interfaces\Repository\Admin;


use App\Domain\Contracts\Repository\Admin\UserRepositoryAdminContract;
use App\Domain\Entity\User;

class UserRepositoryAdmin implements UserRepositoryAdminContract
{
    public function assignAdmin(int $id): User
    {
        /** @var User $user */
        $user = User::find($id);
        $user->{User::ROLE_FIELD} = User::USER_ROLE_ADMIN;
        $user->save();

        return $user->fresh();
    }
}
