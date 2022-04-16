<?php

namespace DWalczyk\Table;

class BlockNameResolver
{

    public function resolve(string $prefix): string
    {
        return sprintf('%s_table', $prefix);
    }

}