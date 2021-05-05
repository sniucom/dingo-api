<?php

namespace Dingo\Api\Exception;

class DeleteResourceFailedException extends ResourceException
{
    /**
     * @inheritdoc
     */
    protected function message()
    {
        return '1000008';
    }
}
