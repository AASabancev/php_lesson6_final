<?php


namespace App\Exceptions;

use Exception;

class GoodNotSendException extends Exception
{
    public function getMessageException(): string
    {
        return 'GOOD_NOT_SEND';
    }

    public function getCodeException(): int
    {
        return 404;
    }

    public function getDescriptionException(): string
    {
        return __('errors.good_not_found');
    }
}
