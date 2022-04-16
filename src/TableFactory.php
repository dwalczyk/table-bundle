<?php

namespace DWalczyk\Table;

use DWalczyk\Paginator\PaginatorInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class TableFactory implements TableFactoryInterface
{
    public function __construct(
        private PaginatorInterface $paginator,
        private ColumnTypeResolverInterface $columnTypeResolver
    )
    {}

    public function createBuilder(mixed $target, array $options = []): TableBuilderInterface
    {
        return new TableBuilder($target, new EventDispatcher(), $this->columnTypeResolver, $this->paginator, $options);
    }
}