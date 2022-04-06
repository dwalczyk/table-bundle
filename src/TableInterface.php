<?php

namespace DWalczyk\Cruder;

interface TableInterface
{
    public function getConfig(): TableConfigInterface;

    /**
     * @return TableItemInterface[]
     */
    public function getHeadings(): array;

    /**
     * @return TableItemInterface[][]
     */
    public function getItems(): array;
}