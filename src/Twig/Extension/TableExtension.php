<?php

namespace DWalczyk\Cruder\Twig\Extension;

use DWalczyk\Cruder\Table;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TableExtension extends AbstractExtension
{
    public function __construct(private Environment $twig)
    {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('table', [$this, 'renderTable'], ['is_safe' => true]),
        ];
    }

    public function renderTable(Table $table, ?string $view = null): string
    {
        return $this->twig->render($view ?? 'table.html.twig', [
            'options' => $table
        ]);
    }
}