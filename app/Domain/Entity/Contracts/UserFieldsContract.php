<?php


namespace App\Domain\Entity\Contracts;


interface UserFieldsContract
{
    public const USER_ID_FIELD = 'id';
    public const LOGIN_FIELD = 'login';
    public const PASSWORD_FIELD = 'password';
    public const ROLE_FIELD = 'role';
    public const REGION_ID_FIELD = 'region_id';
}
