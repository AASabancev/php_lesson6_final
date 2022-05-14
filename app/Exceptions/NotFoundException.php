<?php


namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public function getMessageException(): string
    {
        return 'NOT_FOUND';
    }

    public function getCodeException(): int
    {
        return 404;
    }

    public function getDescriptionException(): string
    {
        return __('errors.not_found');
    }
}
