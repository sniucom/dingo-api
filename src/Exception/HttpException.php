<?php

namespace Dingo\Api\Exception;

use Exception;
use Dingo\Api\Exception\Abstracts\BaseException;

class HttpException extends BaseException
{
    /**
     * @inheritdoc
     */
    protected function status()
    {
        return 500;
    }

    /**
     * @inheritdoc
     */
    protected function message()
    {
        return 'Common.SystemInternalError';
    }
}
