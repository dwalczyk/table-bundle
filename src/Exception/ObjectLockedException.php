<?php

namespace DWalczyk\Cruder\Exception;

class ObjectLockedException extends \Exception
{
    public function __construct(object $object, int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf('Modify locked object "%s" is not allowed.', get_class($object));
        parent::__construct($message, $code, $previous);
    }
}