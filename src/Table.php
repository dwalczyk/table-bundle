<?php

namespace DWalczyk\Cruder;

class Table implements TableInterface
{
    private TableConfigInterface $config;

    /**
     * @var TableItemInterface[]
     */
    private array $headings;

    /**
     * @var TableItemInterface[][]
     */
    private array $items;

    public function __construct(TableConfigInterface $config, array $headings, array $items)
    {
        $this->config = clone $config;

        $this->headings = $headings;
        $this->items = $items;
    }

    public function getConfig(): TableConfigInterface
    {
        return $this->config;
    }

    /**
     * @return TableItemInterface[]
     */
    public function getHeadings(): array
    {
        return $this->headings;
    }

    /**
     * @return TableItemInterface[][]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}