<?php

namespace DWalczyk\Cruder\Exception;

class ValueNotAllowedException extends \Exception
{
    public function __construct(int|string $value, array $allowedValues, int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf('Value "%s" is not allowed. Available values (%s).', $value, implode(', ', $allowedValues));

        parent::__construct($message, $code, $previous);
    }
}