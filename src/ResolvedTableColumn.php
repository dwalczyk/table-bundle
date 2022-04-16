<?php

namespace DWalczyk\Table;

use DWalczyk\Table\ColumnType\ColumnTypeInterface;

class ResolvedTableColumn implements ResolverTableColumnInterface
{
    public function __construct(
        protected string $name,
        protected ColumnTypeInterface $type,
        protected array $options = []
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): ColumnTypeInterface
    {
        return $this->type;
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