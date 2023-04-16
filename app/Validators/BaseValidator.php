<?php


namespace App\Validators;


use App\Contracts\Validator\ValidatorContract;
use Illuminate\Http\Request;

/**
 * Class BaseValidator
 * @package App\Validators
 */
abstract class BaseValidator implements ValidatorContract
{
    /**
     * @param Request $request
     * @return bool
     */
    abstract public function validate(Request $request): bool;
}
