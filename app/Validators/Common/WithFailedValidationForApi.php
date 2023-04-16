<?php

namespace App\Validators\Common;

use Illuminate\Contracts\Validation\Validator;

trait WithFailedValidationForApi
{
	/**
	 * @param Validator $validator
	 */
	protected function failedValidation(Validator $validator): void {
	    $messages = [];

	    foreach ($validator->errors()->getMessages() as $errors) {
            foreach ($errors as $errorMessage) {
                $messages[] = preg_replace('/\"/', '', trim($errorMessage));
            }
        }

	    ApiFailMessagesResponder::throwJsonErrorMessages($messages);
	}
}
