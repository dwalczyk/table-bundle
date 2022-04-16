<?php

namespace DWalczyk\Table;

use DWalczyk\Paginator\PaginatorInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class TableConfigBuilder implements TableConfigBuilderInterface
{
    protected bool $locked = false;

    /**
     * @var array<string, TableColumnInterface>
     */
    protected array $columns;

    /**
     * @param array<string|mixed> $options
     */
    public function __construct(
        protected mixed $target,
        protected EventDispatcherInterface $dispatcher,
        protected ColumnTypeResolverInterface $columnTypeResolver,
        protected PaginatorInterface $paginator,
        protected array $options = []
    )
    {}

    public function getTarget(): mixed
    {
        return $this->target;
    }

    public function getPaginator(): PaginatorInterface
    {
        return $this->paginator;
    }

    public function getColumnTypeResolver(): ColumnTypeResolverInterface
    {
        return $this->columnTypeResolver;
    }

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

    public function getTableConfig(): TableConfigInterface
    {
        $config = clone $this;
        $config->locked = true;

        return $config;
    }

    public function getColumn(string $name): ?TableColumnInterface
    {
        return $this->columns[$name] ?? null;
    }

    public function hasColumn(string $name): bool
    {
        return array_key_exists($name, $this->columns);
    }

    public function allColumns(): array
    {
        return $this->columns;
    }

    public function countColumns(): int
    {
        return count($this->columns);
    }
}