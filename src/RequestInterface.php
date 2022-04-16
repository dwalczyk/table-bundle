<?php

namespace DWalczyk\Table;

interface RequestInterface
{
    public function getPage(): ?int;

    public function getItemsPerPage(): ?int;
}