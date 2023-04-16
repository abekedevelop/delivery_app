<?php


namespace App\Validators\Common;


use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

use Throwable;

class ApiFailMessagesResponder
{
    /**
     * @param array $messages
     * @param int $status
     * @return Throwable
     */
    public static function throwJsonErrorMessages(array $messages, $status = Response::HTTP_UNPROCESSABLE_ENTITY): Throwable
    {
        $responseArray = [
            'statusCode' => $status,
            'messages' => $messages
        ];

        throw new HttpResponseException(
            response()->json(
                $responseArray,
                $status
            )
        );
    }

    public static function throwAbstractValidationError($status = Response::HTTP_UNPROCESSABLE_ENTITY): Throwable
    {
        $responseArray = [
            'statusCode' => $status,
            'message' => 'Wrong data given. Validation is not passed.',
        ];

        throw new HttpResponseException(
            response()->json(
                $responseArray,
                $status
            )
        );
    }
}
