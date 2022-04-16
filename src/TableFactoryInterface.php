<?php

namespace DWalczyk\Table;

interface TableFactoryInterface
{
    public function createBuilder(mixed $target, array $options = []): TableBuilderInterface;
}