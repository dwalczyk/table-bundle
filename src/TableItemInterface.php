<?php

namespace DWalczyk\Table;

use DWalczyk\Table\Renderer\RendererInterface;

interface TableItemInterface
{
    public function getIdentifier(): int|string;

    public function getCells(): array;

    public function getData(): object|array;

    public function render(RendererInterface $renderer, array $vars): string;
}