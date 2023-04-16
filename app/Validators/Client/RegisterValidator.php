<?php


namespace App\Validators\Client;


use App\Domain\Entity\Region;
use App\Validators\BaseValidator;
use App\Validators\Common\WithFailedValidationForApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 * Class RegisterValidator
 * @package App\Validators\Client
 */
class RegisterValidator extends BaseValidator
{
    use WithFailedValidationForApi;
    /**
     * @param Request $request
     * @return bool
     */
    final public function validate(Request $request): bool
    {
        $rules = [
            'login' => ['required', 'string', 'regex:/^[7]\d{9}$/', 'unique:users,login'],
            'password' => ['required', 'string', 'min:8', 'max:20'],
            'regionID' => ['required', 'int', Rule::in(Region::all()->pluck(Region::REGION_ID_FIELD))]
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->failedValidation($validator);
        }

        return true;
    }
}
