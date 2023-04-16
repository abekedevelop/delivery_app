<?php


namespace App\Validators\Admin\Region;


use App\Validators\BaseValidator;
use App\Validators\Common\WithFailedValidationForApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegionCreateValidator extends BaseValidator
{
    use WithFailedValidationForApi;
    /**
     * @param Request $request
     * @return bool
     */
    final public function validate(Request $request): bool
    {
        $rules = [
            'name' => ['required', 'string', 'unique:regions,name'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->failedValidation($validator);
        }

        return true;
    }
}
