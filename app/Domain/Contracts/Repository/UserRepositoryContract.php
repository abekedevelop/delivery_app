<?php

namespace App\Domain\Contracts\Repository;

use App\Domain\DTO\User\RegisterDTO;
use App\Domain\Entity\User;

interface UserRepositoryContract
{
    public function create(RegisterDTO $dto): ?User;
    public function getByLogin(string $login): ?User;
}
