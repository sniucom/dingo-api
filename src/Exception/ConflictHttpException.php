<?php

namespace Dingo\Api\Exception;

use Exception;
use Dingo\Api\Exception\Abstracts\BaseException;

class ConflictHttpException extends BaseException
{
    /**
     * @inheritdoc
     */
    protected function status()
    {
        return 403;
    }

    /**
     * @inheritdoc
     */
    protected function message()
    {
        return 'Common.ConflictRequest';
    }
}
