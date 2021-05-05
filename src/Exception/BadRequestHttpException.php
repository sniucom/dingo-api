<?php

namespace Dingo\Api\Exception;

use Exception;
use Dingo\Api\Exception\Abstracts\BaseException;

class BadRequestHttpException extends BaseException
{
    /**
     * @inheritdoc
     */
    protected function status()
    {
        return 400;
    }

    /**
     * @inheritdoc
     */
    protected function message()
    {
        return 'Common.BadRequest';
    }
}
