<?php

namespace App\Domain\Entity;

use App\Domain\Entity\Contracts\UserFieldsContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements UserFieldsContract
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::LOGIN_FIELD,
        self::PASSWORD_FIELD,
        self::REGION_ID_FIELD,
        self::ROLE_FIELD
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::PASSWORD_FIELD,
        'remember_token',
    ];

    protected $table = 'users';

    public function getCommonAbilities(): array
    {
        return ['create_order'];
    }
}
