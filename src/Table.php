<?php

namespace DWalczyk\Table;

class Table implements TableInterface
{
    private TableConfigInterface $config;

    /**
     * @var ResolverTableColumnInterface[]
     */
    private array $resolvedColumns = [];

    public function __construct(TableConfigInterface $config)
    {
        $this->config = clone $config;
    }

    public function getConfig(): TableConfigInterface
    {
        return $this->config;
    }

    public function handleRequest(RequestInterface $request): void
    {}

    public function getHeading(): TableItemInterface
    {
        return new TableItem();
    }

    /**
     * @return TableItemInterface[]
     */
    public function getItems(): array
    {
        return [];
    }

    public function load(int $page, int $itemsPerPage)
    {
        $this->resolveColumns();



    }

    private function resolveColumns(): void
    {
        $columns = $this->config->allColumns();

        foreach ($columns as $column) {
            $this->resolvedColumns[] = $this->config->getColumnTypeResolver()->resolve($column);
        }
    }

    public function createView(): View
    {
        return new View(
            $this->config->getOption('block_name') ?? 'table',
            [
                'options' => $this->config->getOptions(),
                'table' => $this,
                'columns' => $this->resolvedColumns
            ]
        );
    }
}