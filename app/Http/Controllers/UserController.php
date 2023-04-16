<?php


namespace App\Http\Controllers;

use App\Domain\Contracts\Interactor\UserInteractorContract;
use App\Domain\DTO\User\RegisterDTO;
use App\Validators\BaseValidator;
use App\Validators\Client\RegisterValidator;
use Illuminate\Http\Request;

/**
 * Class AdminUserController
 * @package App\Http\Controllers
 */
class UserController
{
    /** @var UserInteractorContract */
    private $userInteractor;

    public function __construct(UserInteractorContract $userInteractor)
    {
        $this->userInteractor = $userInteractor;
    }

    public function register(Request $request)
    {
        /** @var BaseValidator $validator */
        $validator = app()->make(RegisterValidator::class);
        $validator->validate($request);

        $user = $this->userInteractor->Register(RegisterDTO::fromRequest($request));


        return response()->json(
            [
                'token' => $user->createToken('access_token', $user->getCommonAbilities())->plainTextToken,
                'token_type' => 'Bearer',
            ]
        );
    }
}
