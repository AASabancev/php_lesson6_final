<?

namespace App\Exceptions;

use Exception;

class MethodNotAllowedException extends Exception
{
    // пустышка для ответа демонстрации
    public function getMessageException(): string
    {
        return 'METHOD_NOT_ALLOWED';
    }

    public function getCodeException(): int
    {
        return 405;
    }

    public function getDescriptionException(): string
    {
        return __('errors.not_found');
    }
}
