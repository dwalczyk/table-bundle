<?php

namespace DWalczyk\Table;

class View
{
    public function __construct(
        private string $block,
        private array $vars,
    )
    {}

    public function getBlock(): string
    {
        return $this->block;
    }

    public function getVars(): array
    {
        return $this->vars;
    }
}