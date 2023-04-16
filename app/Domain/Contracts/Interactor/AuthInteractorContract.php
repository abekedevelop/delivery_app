<?php


namespace App\Domain\Contracts\Interactor;


use App\Domain\DTO\User\Login;
use App\Domain\Entity\User;

interface AuthInteractorContract
{
    public function Authenticate(Login $dto): ?User;
}
