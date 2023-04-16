<?php


namespace App\Domain\DTO\User;


use App\Domain\DTO\DataTransferObject;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Login extends DataTransferObject
{
    /** @var string $login */
    public $login;
    /** @var string $password */
    public $password;

    public static function fromRequest(Request $request) {
        return new self([
            'login' => Arr::get($request->toArray(), 'login'),
            'password' => Arr::get($request->toArray(), 'password'),
        ]);
    }
}
