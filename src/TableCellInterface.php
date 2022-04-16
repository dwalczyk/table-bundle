<?php

namespace DWalczyk\Table;

use DWalczyk\Table\ColumnType\ColumnTypeInterface;
use DWalczyk\Table\Renderer\RendererInterface;

interface TableCellInterface
{
    public function getColumn(): TableColumnInterface;

    public function getValue(): mixed;

    public function getOptions(): array;

    public function render(RendererInterface $renderer, array $vars = []): string;
}