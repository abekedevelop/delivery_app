<?php


namespace App\Validators\Order;


use App\Validators\BaseValidator;
use App\Validators\Common\WithFailedValidationForApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateOrderValidator extends BaseValidator
{
    use WithFailedValidationForApi;
    /**
     * @param Request $request
     * @return bool
     */
    final public function validate(Request $request): bool
    {
        $rules = [
            'fromRegionID' => ['required', 'int', 'exists:regions,id'],
            'toRegionID' => ['required', 'int', 'exists:regions,id'],
            'deliveryDate' => ['required', 'date_format:Y-m-d', 'after_or_equal:today']
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->failedValidation($validator);
        }

        return true;
    }
}
