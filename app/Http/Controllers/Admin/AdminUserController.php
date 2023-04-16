<?php


namespace App\Http\Controllers\Admin;


use App\Domain\Contracts\Interactor\Admin\UserInteractorAdminContract;
use App\Validators\Admin\User\AssignAdminValidator;
use App\Validators\BaseValidator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminUserController
{
    /**
     * @var UserInteractorAdminContract $userInteractor
     */
    private $userInteractor;
    public function __construct(UserInteractorAdminContract $userInteractor)
    {
        $this->userInteractor = $userInteractor;
    }

    public function setAdmin(Request $request)
    {
        /** @var BaseValidator $validator */
        $validator = app()->make(AssignAdminValidator::class);
        $validator->validate($request);

        try {
            $this->userInteractor->assignAdmin($request->get('userID'));
        } catch (\Exception $e) {
            // TODO log
            return response()->json([
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Ошибка на сервере. Попробуйте позднее'
            ]);
        }



        return response()->json([
            'statusCode' => Response::HTTP_OK,
            'message' => 'Пользователь назначен администратором'
        ]);
    }
}
