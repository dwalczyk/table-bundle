<?php

namespace DWalczyk\Table;

interface TableBuilderInterface
{
    public function add(TableColumnInterface $tableColumn): static;

    public function getTableConfig(): TableConfigInterface;

    public function getTable(): TableInterface;
}