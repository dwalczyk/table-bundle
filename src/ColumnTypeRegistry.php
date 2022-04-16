<?php

namespace DWalczyk\Table;

use DWalczyk\Table\ColumnType\ColumnTypeInterface;

class ColumnTypeRegistry implements ColumnTypeRegistryInterface
{
    private array $types = [];

    /**
     * @param ColumnTypeInterface[] $types
     */
    public function __construct(iterable $types)
    {
        foreach ($types as $type) {
            $this->addType($type);
        }
    }

    private function addType(ColumnTypeInterface $columnType)
    {
        $this->types[get_class($columnType)] = $columnType;
    }

    public function getType(string $fqcn): ColumnTypeInterface
    {
        if (!isset($this->types[$fqcn])) {
            throw new \Exception(sprintf('ColumnType "%s" does not exist in registry.', $fqcn));
        }

        return $this->types[$fqcn];
    }
}