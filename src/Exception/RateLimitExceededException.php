<?php

namespace Dingo\Api\Exception;

use Exception;
use Dingo\Api\Exception\Abstracts\BaseException;

class RateLimitExceededException extends BaseException
{
    /**
     * Create a new rate limit exceeded exception instance.
     *
     * @param string     $message
     * @param \Exception $previous
     * @param array      $headers
     * @param int        $code
     *
     * @return void
     */
    public function __construct($message = null, Exception $previous = null, $headers = [], $code = 0)
    {
        if (array_key_exists('X-RateLimit-Reset', $headers)) {
            $headers['Retry-After'] = $headers['X-RateLimit-Reset'] - time();
        }

        parent::__construct($message, null, $previous, $headers, $code);
    }

    /**
     * @inheritdoc
     */
    protected function status()
    {
        return 429;
    }

    /**
     * @inheritdoc
     */
    protected function message()
    {
        return '1000011';
    }
}
