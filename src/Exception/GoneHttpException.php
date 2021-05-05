<?php

namespace Dingo\Api\Exception;

use Exception;
use Dingo\Api\Exception\Abstracts\BaseException;

class GoneHttpException extends BaseException
{
    /**
     * @inheritdoc
     */
    protected function status()
    {
        return 410;
    }

    /**
     * @inheritdoc
     */
    protected function message()
    {
        return 'Common.ResourceHadGone';
    }
}
