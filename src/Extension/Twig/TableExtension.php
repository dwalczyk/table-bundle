<?php

namespace DWalczyk\Table\Extension\Twig;

use DWalczyk\Table\Renderer\RendererInterface;
use DWalczyk\Table\View;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TableExtension extends AbstractExtension
{
    public function __construct(private Environment $twig, private RendererInterface $renderer)
    {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('table', [$this, 'renderTable'], ['is_safe' => [true]]),
        ];
    }

    public function renderTable(View $view): string
    {
        return $this->renderer->renderBlock($view->getBlock(), $view->getVars());
    }
}