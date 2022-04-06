<?php

namespace DWalczyk\Cruder\Model;

use DWalczyk\Cruder\Exception\ObjectLockedException;

class SortStack
{
    /**
     * @param Sort[] $sorts
     */
    private array $sorts;

    /**
     * True value means no one can modify this object
     */
    private bool $locked;

    public function __construct(array $sorts)
    {
        foreach ($sorts as $sort) {
            $this->addSort($sort);
        }
    }

    /**
     * @return Sort[]
     */
    public function all(): array
    {
        return $this->sorts;
    }

    public function addSort(Sort $sort): static
    {
        if ($this->locked == true) {
            throw new ObjectLockedException($this);
        }

        $this->sorts[] = $sort;
        return $this;
    }

    public function lock(): void
    {
        $this->locked = true;
    }
}