<?php

namespace DWalczyk\Table;

use DWalczyk\Table\Renderer\RendererInterface;

class TableCell implements TableCellInterface
{
    public function __construct(
        private TableColumnInterface $column,
        private mixed $value,
        private array $options
    )
    {}

    public function getColumn(): TableColumnInterface
    {
        return $this->column;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function render(RendererInterface $renderer, array $vars = []): string
    {
        $view = $this->column->getType()->buildCellView($this);

        $vars += $view->getVars();

        $vars['value'] = $this->value;

        return $renderer->renderBlock($this->column->getType()->getBlockPrefix(), $vars);
    }
}