<?php

namespace Cordpuller_old\libs\errors;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class DiscordException extends \Exception {

    const HTTP_CODE = 500;
    const HTTP_MESSAGE = 'Internal Server Error';

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {

        if($message == null){
            $message = static::HTTP_MESSAGE;
        }

        if($code == null){
            $code = static::HTTP_CODE;
        }

        parent::__construct($message, $code, $previous);
    }

}