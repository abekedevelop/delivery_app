<?php

namespace App\Validators\Auth;


use App\Validators\BaseValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class AuthValidator
 * @package App\Validators\Auth
 */
class AuthValidator extends BaseValidator
{
    /**
     * @param Request $request
     * @return bool
     */
    public function validate(Request $request): bool
    {
        return Validator::make($request->all(), [
            'login' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ])->fails() ? false : true;
    }
}
