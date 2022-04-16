<?php

namespace DWalczyk\Table\Extension\Twig;

use DWalczyk\Table\Renderer\RendererInterface;
use Twig\Environment;

class TwigRenderer implements RendererInterface
{
    public function __construct(
        private Environment $twig,
        private array $templatePaths = ['@Table/template.html.twig']
    )
    {}

    public function renderBlock(string $block, array $variables): string
    {
        foreach ($this->templatePaths as $templatePath) {

            $template = $this->twig->createTemplate($templatePath);

            dump($template->getBlockNames());

            if ($template->hasBlock($block))  {
                return $template->renderBlock($block, $variables);
            }
        }

        throw new \Exception(sprintf('Cannot render block "%s". Template contains this block does not exist.', $block));
    }
}