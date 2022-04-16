<?php

namespace DWalczyk\Table;

use DWalczyk\Paginator\PaginatorInterface;

interface TableConfigInterface
{
    public function getTarget(): mixed;

    public function getPaginator(): PaginatorInterface;

    public function getColumnTypeResolver(): ColumnTypeResolverInterface;

    /**
     * @return array<string, mixed> The passed options
     */
    public function getOptions(): array;

    /**
     * Returns whether a specific option exists.
     */
    public function hasOption(string $name): bool;

    /**
     * Returns the value of a specific option.
     */
    public function getOption(string $name, mixed $default = null): mixed;

    public function getColumn(string $name): ?TableColumnInterface;

    public function hasColumn(string $name): bool;

    /**
     * @return array<string, TableColumnInterface>
     */
    public function allColumns(): array;

    public function countColumns(): int;
}