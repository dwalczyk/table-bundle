<?php

namespace DWalczyk\Cruder;

use DWalczyk\Cruder\Model\SortStack;
use DWalczyk\Paginator\PaginatorInterface;

interface TableConfigInterface
{
    public function getTarget(): mixed;

    public function getPaginator(): PaginatorInterface;

    /**
     * @return ColumnDefinitionInterface[]
     */
    public function getColumnsDefinitions(): array;

    /**
     * Returns all options passed during the construction of the form.
     *
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

    /**
     * @return int[] e.g. [15, 30, 45, 60, 90]
     */
    public function getAllowedItemsPerPage(): array;

    /**
     * @return int e.g. 30
     */
    public function getDefaultItemsPerPage(): int;

    public function getDefaultSort(): SortStack;
}