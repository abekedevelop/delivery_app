<?php


namespace App\Domain\Contracts\Repository\Admin;

use App\Domain\Entity\User;

/**
 * Interface UserRepositoryAdmin
 * @package App\Domain\Contracts\Repository\Admin
 */
interface UserRepositoryAdminContract
{
    /**
     * @param int $id
     * @return User
     */
    public function assignAdmin(int $id): User;
}
