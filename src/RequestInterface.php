<?php

namespace DWalczyk\Cruder;

use DWalczyk\Cruder\Model\SortStack;

interface RequestInterface
{
    public function getPage(): ?int;

    public function getItemsPerPage(): ?int;

    /**
     * @return array<string, mixed> [filterId => filterValue, ...]
     */
    public function getFiltersValues(): array;

    public function getSort(): ?SortStack;
}