<?php

namespace DWalczyk\Cruder\TempLibrary\HtmlElement;

class HtmlAttribute implements HtmlAttributeInterface
{
    public function __construct(
        protected string $name,
        protected int|string|array|null $value,
        protected string $iterableSeparator = ' '
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): int|string|array|null
    {
        return $this->value;
    }

    public function updateValue(callable $callback): static
    {
        $this->value = $callback($this->value);

        return $this;
    }

    public function appendValue(string $value): static
    {
        if ($this->value === null) {
            $this->value = $value;
        }

        if (is_array($this->value)) {
            $this->value[] = $value;
        } else {
            $this->value .= ' ' . $value;
        }

        return $this;
    }

    public function render(): string
    {
        if ($this->value === null) {
            return $this->name;
        }

        if (is_array($this->value)) {
            $value = implode($this->iterableSeparator, $this->value);
        } else {
            $value = $this->value;
        }

        return sprintf('%s="%s"', $this->name, $value);
    }

    public function __toString(): string
    {
        return $this->render();
    }
}