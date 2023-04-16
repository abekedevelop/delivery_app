<?php

namespace App\Http\Requests;

use App\Models\Region;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'login' => ['required', 'string', 'regex:/^[7]\d{9}$/'],
                'password' => ['required', 'string', 'min:8', 'max:20'],
                'regionID' => ['required', 'int', Rule::in(Region::all()->pluck(Region::REGION_NAME_FIELD))]
        ];
    }
}
