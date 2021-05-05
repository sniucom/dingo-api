<?php

namespace Dingo\Api\Exception\Abstracts;

use Exception;
use Illuminate\Support\MessageBag;
use Dingo\Api\Contract\Debug\MessageBagErrors;
use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class BaseException extends HttpException implements MessageBagErrors
{
    /**
     * MessageBag errors.
     *
     * @var \Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * 创建错误实例
     *
     * @param null $message
     * @param null $errors
     * @param Exception|null $previous
     * @param array $headers
     * @param int $code
     */
    public function __construct($message = null, $errors = null, Exception $previous = null, $headers = [], $code = 0)
    {
        $status = $this->status();
        $code = $this->getFinalCode($code, $message);
        $message = $this->getLocalMessage($message);

        if (is_null($errors)) {
            $this->errors = new MessageBag;
        } else {
            $this->errors = is_array($errors) ? new MessageBag($errors) : $errors;
        }

        parent::__construct($status, $message, $previous, $headers, $code);
    }

    /**
     * 获取错误的默认HTTP状态码
     *
     * @return mixed
     */
    abstract protected function status();

    /**
     * 获取错误信息
     *
     * @return mixed
     */
    abstract protected function message();

    /**
     * 获取消息包内的消息.
     *
     * @return \Illuminate\Support\MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * 判断错误消息包内是否有消息.
     *
     * @return bool
     */
    public function hasErrors()
    {
        return !$this->errors->isEmpty();
    }

    /**
     * 获取本地化消息
     *
     * @param $message
     * @return array|mixed|string|null
     */
    private function getLocalMessage($message)
    {
        $message = empty($message) || !is_string($message) ? $this->message() : $message;
        if (preg_match("/^\d+$/", $message)) {
            return __('api::errors.' . $message);
        }

        return $message;
    }

    /**
     * 获取终极code
     *
     * @param $code
     * @param $message
     * @return mixed
     */
    private function getFinalCode($code, $message)
    {
        if (!$code) {
            $message = empty($message) || !is_string($message) ? $this->message() : $message;
            if (preg_match("/^\d+$/", $message)) {
                $code = $message;
            } else {
                $code = '1000001';
            }
        }

        return $code;
    }
}
