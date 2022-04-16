<?php

namespace DWalczyk\Table;

interface TableInterface
{
    public function getConfig(): TableConfigInterface;

    public function handleRequest(RequestInterface $request): void;

    public function load(int $page, int $itemsPerPage);

    public function getHeading(): TableItemInterface;

    /**
     * @return TableItemInterface[]
     */
    public function getItems(): array;

    public function createView(): View;
}