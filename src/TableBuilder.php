<?php

namespace DWalczyk\Table;

use DWalczyk\Paginator\PaginatorInterface;
use DWalczyk\Table\Exception\BadMethodCallException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class TableBuilder extends TableConfigBuilder implements TableBuilderInterface
{
    public function __construct(
        mixed $target,
        EventDispatcherInterface $dispatcher,
        ColumnTypeResolverInterface $columnTypeResolver,
        PaginatorInterface $paginator,
        array $options = []
    )
    {
        parent::__construct($target, $dispatcher, $columnTypeResolver, $paginator, $options);

        $this->columns = [];
    }

    public function add(TableColumnInterface $tableColumn): static
    {
        if ($this->locked) {
            throw new BadMethodCallException('TableBuilder methods cannot be accessed anymore once the builder is turned into a TableConfigInterface instance.');
        }

        $this->columns[$tableColumn->getName()] = $tableColumn;

        return $this;
    }

    public function remove(string $name): static
    {
        if ($this->locked) {
            throw new BadMethodCallException('TableBuilder methods cannot be accessed anymore once the builder is turned into a TableConfigInterface instance.');
        }

        unset($this->columns[$name]);

        return $this;
    }

    public function getTable(): TableInterface
    {
        if ($this->locked) {
            throw new BadMethodCallException('TableBuilder methods cannot be accessed anymore once the builder is turned into a TableConfigInterface instance.');
        }

        $table = new Table($this->getTableConfig());

        return $table;
    }
}