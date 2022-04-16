<?php

namespace DWalczyk\Table;

interface ColumnTypeResolverInterface
{
    public function resolve(TableColumnInterface $tableColumn): ResolverTableColumnInterface;
}