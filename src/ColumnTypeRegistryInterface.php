<?php

namespace DWalczyk\Table;

use DWalczyk\Table\ColumnType\ColumnTypeInterface;

interface ColumnTypeRegistryInterface
{
    public function getType(string $fqcn): ColumnTypeInterface;
}