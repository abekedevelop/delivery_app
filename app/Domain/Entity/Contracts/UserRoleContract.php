<?php


namespace App\Domain\Entity\Contracts;


interface UserRoleContract
{
    public const USER_ROLE_CLIENT = 1;
    public const USER_ROLE_ADMIN = 2;
    public const USER_ROLE_COURIER = 3;
}
