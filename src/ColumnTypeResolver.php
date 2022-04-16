<?php

namespace DWalczyk\Table;

class ColumnTypeResolver implements ColumnTypeResolverInterface
{
    public function __construct(private ColumnTypeRegistryInterface $columnTypeRegistry)
    {
    }

    public function resolve(TableColumnInterface $tableColumn): ResolverTableColumnInterface
    {
        return new ResolvedTableColumn(
            $tableColumn->getName(),
            $this->columnTypeRegistry->getType($tableColumn->getTypeClass()),
            $tableColumn->getOptions()
        );
    }
}