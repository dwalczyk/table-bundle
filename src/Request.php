<?php

namespace DWalczyk\Table;

class Request implements RequestInterface
{
    public function __construct(
        private int $page,
        private int $itemsPerPage,
    )
    {}

    public function getPage(): int
    {
        return $this->page;
    }

    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }
}