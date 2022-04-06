<?php

namespace DWalczyk\Cruder;

interface SortInterface
{
    public function getBy(): string;

    public function getDirection(): string;
}