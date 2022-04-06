<?php

namespace DWalczyk\Cruder;

use DWalczyk\Cruder\Model\SortStack;

class Request implements RequestInterface
{
    public function getPage(): ?int
    {
        return 1;
    }

    public function getItemsPerPage(): ?int
    {
        return 12;
    }

    public function getFiltersValues(): array
    {
        return [];
    }

    public function getSort(): ?SortStack
    {
        return null;
    }
}