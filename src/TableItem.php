<?php

namespace DWalczyk\Table;

use DWalczyk\Table\Renderer\RendererInterface;

class TableItem implements TableItemInterface
{
    public function __construct(
        private int|string $identifier,
        private array $cells,
        private object|array $data,
        private string $block
    )
    {}

    public function getIdentifier(): int|string
    {
        return $this->identifier;
    }

    /**
     * @return TableCellInterface[]
     */
    public function getCells(): array
    {
        return $this->cells;
    }

    public function getData(): object|array
    {
        return $this->data;
    }

    public function render(RendererInterface $renderer, array $vars = []): string
    {
        $vars['cells'] = $this->cells;

        return $renderer->renderBlock($this->block, $vars);
    }
}