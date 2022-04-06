<?php

namespace DWalczyk\Cruder;

interface TableItemInterface
{
    public function getDefinition(): ColumnDefinitionInterface;

    public function isSorted(): bool;

    public function render(): string;
}