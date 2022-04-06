<?php

namespace DWalczyk\Cruder;

use DWalczyk\Cruder\Exception\ValueNotAllowedException;
use DWalczyk\Paginator\PaginatorResultInterface;

class TableFactory
{
    public function factory(TableConfigInterface $config, RequestInterface $request): TableInterface
    {
        $pagination = $this->paginate($config, $request);

        return new Table(
            $config,
            $this->getHeadings($config),
            $this->getItems($config, $pagination),
        );
    }

    private function paginate(TableConfigInterface $config, RequestInterface $request): PaginatorResultInterface
    {
        return $config->getPaginator()->paginate(
            $config->getTarget(),
            $this->resolvePage($request),
            $this->resolveItemsPerPage($config, $request)
        );
    }

    /**
     * @param TableConfigInterface $config
     * @return TableItemInterface[]
     */
    private function getHeadings(TableConfigInterface $config): array
    {
        return array_map(function (ColumnDefinitionInterface $definition) use ($config): TableItemInterface {

            return new TableItem(
                $definition,
                $definition->renderLabel()
            );

        }, $config->getColumnsDefinitions());
    }

    /**
     * @return TableItemInterface[][]
     */
    private function getItems(TableConfigInterface $config, PaginatorResultInterface $paginatorResult): array
    {
        $items = [];

        $i = 0;

        foreach ($paginatorResult->getItems() as $item) {

            $row = [];

            foreach ($config->getColumnsDefinitions() as $definition) {
                $row[$i] = new TableItem($definition, $definition->renderValue($item));
            }

            $items[$i] = $row;
            $i++;
        }

        return $items;
    }

    private function resolvePage(RequestInterface $request): int
    {
        $page = $request->getPage() ?? 1;
        if ($page < 1) {
            throw new \Exception('Page can not be lower than 1.');
        }
        return $page;
    }

    private function resolveItemsPerPage(TableConfigInterface $config, RequestInterface $request): int
    {
        $itemsPerPage = $request->getItemsPerPage() ?? $config->getDefaultItemsPerPage();
        if (!in_array($itemsPerPage, $config->getAllowedItemsPerPage())) {
            throw new ValueNotAllowedException($itemsPerPage, $config->getAllowedItemsPerPage());
        }

        return $itemsPerPage;
    }
}