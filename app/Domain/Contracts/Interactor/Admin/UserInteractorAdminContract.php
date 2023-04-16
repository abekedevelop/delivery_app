<?php


namespace App\Domain\Contracts\Interactor\Admin;

use App\Domain\Entity\User;

/**
 * Interface UserInteractorAdminContract
 * @package App\Domain\Contracts\Interactor\Admin
 */
interface UserInteractorAdminContract
{
    /**
     * @param int $userID
     * @return bool
     */
    public function assignAdmin(int $userID): User;
}
