<?php


namespace App\Domain\Contracts\Interactor;

use App\Domain\DTO\User\RegisterDTO;
use App\Domain\Entity\User;

interface UserInteractorContract
{
    public function Register(RegisterDTO $dto): ?User;
}
