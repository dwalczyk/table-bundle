<?php

namespace DWalczyk\Table\Renderer;

interface RendererInterface
{
    public function renderBlock(string $block, array $variables): string;
}