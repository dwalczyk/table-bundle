<?php

namespace DWalczyk\Table\ColumnType;

use DWalczyk\Table\TableCell;
use DWalczyk\Table\View;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Symfony\Component\String\u;

abstract class AbstractTableColumn implements ColumnTypeInterface
{
    public function buildCellView(TableCell $tableColumn): View
    {
        return new View([]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {}

    public function getLabelBlockPrefix(): string
    {
        return sprintf('%s_%s', $this->resolvePrefix(), 'label');
    }

    public function getDataBlockPrefix(): string
    {
        return sprintf('%s_%s', $this->resolvePrefix(), 'data');
    }

    private function resolvePrefix(): string
    {
        $classPath = explode('\\', __CLASS__); // explode namespace
        $className =  array_pop($classPath);

        return u($className)
            ->replace('CellType', '')
            ->snake()
        ;
    }
}