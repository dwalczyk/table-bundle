<?php

namespace DWalczyk\Table;

interface SortInterface
{
    public function getBy(): string;

    public function getDirection(): string;
}