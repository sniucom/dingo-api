<?php

namespace Dingo\Api\Exception;

use Exception;
use Dingo\Api\Exception\Abstracts\BaseException;

class UnauthorizedHttpException extends BaseException
{
    /**
     * @param string     $challenge WWW-Authenticate challenge string
     * @param string     $message   The internal exception message
     * @param \Throwable $previous  The previous exception
     * @param int        $code      The internal exception code
     */
    public function __construct(string $challenge, string $message = null, \Throwable $previous = null, ?int $code = 0, array $headers = [])
    {
        $headers['WWW-Authenticate'] = $challenge;

        parent::__construct(401, $message, $previous, $headers, $code);
    }

    /**
     * @inheritdoc
     */
    protected function status()
    {
        return 401;
    }

    /**
     * @inheritdoc
     */
    protected function message()
    {
        return 'Common.Unauthorized';
    }
}
