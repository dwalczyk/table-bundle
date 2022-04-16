<?php

namespace DWalczyk\Table;


interface TableColumnInterface
{
    public function getName(): string;

    public function getTypeClass(): string;

    /**
     * @return array<string, mixed> The passed options
     */
    public function getOptions(): array;

    /**
     * Returns whether a specific option exists.
     */
    public function hasOption(string $name): bool;

    /**
     * Returns the value of a specific option.
     */
    public function getOption(string $name, mixed $default = null): mixed;
}