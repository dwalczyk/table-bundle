<?php

namespace DWalczyk\Table;

class TableColumn implements TableColumnInterface
{
    public function __construct(
        protected string $name,
        protected string $typeClass,
        protected array $options = []
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getTypeClass(): string
    {
        return $this->typeClass;
    }

    /**
     * @return array<string,mixed>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    public function hasOption(string $name): bool
    {
        return array_key_exists($name, $this->options);
    }

    public function getOption(string $name, mixed $default = null): mixed
    {
        return $this->hasOption($name) ? $this->options[$name] : $default;
    }
}