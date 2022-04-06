<?php

namespace DWalczyk\Cruder;

use DWalczyk\Cruder\Model\SortStack;
use DWalczyk\Paginator\PaginatorInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class TableConfigBuilder
{
    public function __construct(
        protected PaginatorInterface $paginator,
        protected EventDispatcherInterface $dispatcher
    )
    {}

    public function build(
        mixed $target,
        array $columnsDefinitions,
        array $options = [],
        array $allowedItemsPerPage = [12, 24, 36],
        int $defaultItemsPerPage = 36,
        ?SortStack $defaultSort = null,
    ): TableConfigInterface
    {
        if ($defaultSort == null) {
            $defaultSort = new SortStack([]);
        }

        return new TableConfig(
            $target,
            $allowedItemsPerPage,
            $defaultItemsPerPage,
            $defaultSort,
            $columnsDefinitions,
            $options,
            $this->paginator,
            $this->dispatcher
        );
    }

}