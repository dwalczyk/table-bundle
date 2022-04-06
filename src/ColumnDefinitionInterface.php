<?php

namespace DWalczyk\Cruder;

interface ColumnDefinitionInterface
{
    /**
     * Must be unique per table config
     */
    public function getId(): string;

    /**
     * Render a content inside the col in head
     */
    public function renderLabel(): string;

    /**
     * Render a content inside the col in body
     */
    public function renderValue(object|array $item): string;

    /**
     * Determine is sortable
     */
    public function isSortable(): bool;

    /**
     * If isSortable = false it should return null
     * otherwise it should return sort definition
     */
    public function getSort(): ?SortInterface;
}