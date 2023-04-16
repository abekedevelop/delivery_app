<?php


namespace App\Validators\Admin\Order;


use App\Validators\BaseValidator;
use App\Validators\Common\WithFailedValidationForApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderCombineValidator extends BaseValidator
{
    use WithFailedValidationForApi;
    /**
     * @param Request $request
     * @return bool
     */
    final public function validate(Request $request): bool
    {
        $rules = [
            'orderIds.*' => ['required', 'int', 'exists:orders,id'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->failedValidation($validator);
        }

        return true;
    }
}
