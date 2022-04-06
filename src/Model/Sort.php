<?php

namespace DWalczyk\Cruder\Model;

use DWalczyk\Cruder\SortInterface;

class Sort implements SortInterface
{
    public function __construct(
        private string $by,
        private string $direction
    )
    {}

    public function getBy(): string
    {
        return $this->by;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }
}