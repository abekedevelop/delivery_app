<?php


namespace App\Contracts\Validator;

use Illuminate\Http\Request;

/**
 * Interface ValidatorContract
 * @package App\Contracts\Validator
 */
interface ValidatorContract
{
    /**
     * @param Request $request
     * @return bool
     */
    public function validate(Request $request): bool;
}
