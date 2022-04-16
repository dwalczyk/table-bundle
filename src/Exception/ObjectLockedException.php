<?php

namespace DWalczyk\Table\Exception;

class ObjectLockedException extends \Exception implements ExceptionInterface
{
    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}