<?php

namespace DWalczyk\Table;

interface TableConfigBuilderInterface extends TableConfigInterface
{
    public function getTableConfig(): TableConfigInterface;
}