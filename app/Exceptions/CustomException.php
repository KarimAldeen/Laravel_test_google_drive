<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;

class CustomException extends Exception
{
    protected $messages ;

    public function __construct($code = 404, $message = null, Exception $previous = null)
    {
        $ExceptionMessage = Config::get('appSetting.Exception');

        $this->messages = $ExceptionMessage;
        $message = $message ?? $this->getMessageForStatusCode($code);
        parent::__construct($message, $code, $previous);
    }

    protected function getMessageForStatusCode($code)
    {
        return $this->messages[$code] ?? __("Internal server error");
    }

    public function render($request): JsonResponse
    {
        return response()->json([
            "success" => false,
            "message" => __("exception.$this->message"),
            "status" => $this->code,
            "data" => [],
        ], $this->code);
    }
}
