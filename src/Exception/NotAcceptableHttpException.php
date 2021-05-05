<?php

namespace Dingo\Api\Exception;

use Exception;
use Dingo\Api\Exception\Abstracts\BaseException;

class NotAcceptableHttpException extends BaseException
{
    /**
     * @inheritdoc
     */
    protected function status()
    {
       return 406;
    }

    /**
     * @inheritdoc
     */
    protected function message()
    {
        return 'Common.NotAcceptable';
    }
}
