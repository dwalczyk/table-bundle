<?php

namespace DWalczyk\Cruder;

class TableItem implements TableItemInterface
{
    public function __construct(
        private ColumnDefinitionInterface $definition,
        private mixed $content
    )
    {}

    public function getDefinition(): ColumnDefinitionInterface
    {
        return $this->definition;
    }

    public function isSorted(): bool
    {
        return false;
    }

    public function render(): string
    {
        return $this->content;
    }
}