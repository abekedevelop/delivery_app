<?php


namespace App\Http\Controllers;


use App\Domain\Contracts\Interactor\AuthInteractorContract;
use App\Domain\DTO\User\Login;
use App\Validators\BaseValidator;
use App\Validators\Client\LoginValidator;
use App\Validators\Common\ApiFailMessagesResponder;
use Illuminate\Http\Request;

class AuthController
{
    /** @var AuthInteractorContract */
    private $authInteractor;

    public function __construct(AuthInteractorContract $authInteractor)
    {
        $this->authInteractor = $authInteractor;
    }

    public function authenticate(Request $request)
    {
        /** @var BaseValidator $validator */
        $validator = app()->make(LoginValidator::class);
        $validator->validate($request);

        $user = $this->authInteractor->Authenticate(Login::fromRequest($request));
        if (!$user) {
            ApiFailMessagesResponder::throwAbstractValidationError();
        }

        return response()->json(
            [
                'token' => $user->createToken('access_token', $user->getCommonAbilities())->plainTextToken,
                'token_type' => 'Bearer',
            ]
        );
    }
}
