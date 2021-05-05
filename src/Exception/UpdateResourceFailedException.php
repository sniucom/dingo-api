<?php

namespace Dingo\Api\Exception;

class UpdateResourceFailedException extends ResourceException
{
    /**
     * @inheritdoc
     */
    protected function message()
    {
        return '1000007';
    }
}
