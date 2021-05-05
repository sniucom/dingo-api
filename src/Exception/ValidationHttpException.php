<?php

namespace Dingo\Api\Exception;

use Exception;

class ValidationHttpException extends ResourceException
{
    /**
     * Create a new validation HTTP exception instance.
     *
     * @param \Illuminate\Support\MessageBag|array $errors
     * @param \Exception                           $previous
     * @param array                                $headers
     * @param int                                  $code
     *
     * @return void
     */
    public function __construct($errors = null, Exception $previous = null, $headers = [], $code = 0)
    {
        $message = is_array($errors) && !empty($errors) && is_string($errors[0]) ? $errors[0] : null;
        parent::__construct($message, $errors, $previous, $headers, $code);
    }

    /**
     * @inheritdoc
     */
    protected function message()
    {
        return '1000016';
    }
}
