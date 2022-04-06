<?php

namespace DWalczyk\Cruder\TempLibrary\HtmlElement;

interface HtmlAttributeInterface
{
    public function getName(): string;

    public function getValue(): int|string|array|null;

    /**
     * @param callable $callback - fn(int|string|array|null $value)
     */
    public function updateValue(callable $callback): static;

    public function render(): string;

    public function __toString(): string;
}