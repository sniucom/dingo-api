<?php

namespace Dingo\Api\Exception;

class StoreResourceFailedException extends ResourceException
{
    /**
     * @inheritdoc
     */
    protected function message()
    {
        return '1000006';
    }
}
