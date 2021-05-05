<?php

namespace Dingo\Api\Exception;

use Exception;
use Dingo\Api\Exception\Abstracts\BaseException;

class ResourceException extends BaseException
{
    /**
     * @inheritdoc
     */
    protected function status()
    {
        return 422;
    }

    /**
     * @inheritdoc
     */
    protected function message()
    {
        return 'Common.UnprocessableEntity';
    }
}
