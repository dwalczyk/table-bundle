<?php

namespace DWalczyk\Cruder;

use DWalczyk\Cruder\Model\SortStack;
use DWalczyk\Paginator\PaginatorInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TableConfig implements TableConfigInterface
{

    protected array $options;

    /**
     * @param int[] $allowedItemsPerPage
     * @param ColumnDefinitionInterface[] $columnsDefinitions
     * @param array<string, mixed> $options
     */
    public function __construct(
        protected mixed $target,
        protected array $allowedItemsPerPage,
        protected int $defaultItemsPerPage,
        protected SortStack $defaultSort,
        protected array $columnsDefinitions,
        array $options,
        protected PaginatorInterface $paginator,
        protected EventDispatcherInterface $dispatcher
    )
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults($this->getDefaultOptions());

        $this->options = $resolver->resolve($options);
    }

    private function getDefaultOptions(): array
    {
        return [
            'attr' => [
                'class' => 'table',
            ],
            'row_attr' => [
                'class' => 'table-row',
            ],
            'col_attr' => [
                'class' => 'table-col',
            ],
            'templates' => [
                'th' => '@Table/parts/th.html.twig'
            ]
        ];
    }

    public function getTarget(): mixed
    {
        return $this->target;
    }

    public function getPaginator(): PaginatorInterface
    {
        return $this->paginator;
    }

    /**
     * @return int[]
     */
    public function getAllowedItemsPerPage(): array
    {
        return $this->allowedItemsPerPage;
    }

    public function getDefaultItemsPerPage(): int
    {
        return $this->defaultItemsPerPage;
    }

    public function getDefaultSort(): SortStack
    {
        return $this->defaultSort;
    }

    /**
     * @return ColumnDefinitionInterface[]
     */
    public function getColumnsDefinitions(): array
    {
        return $this->columnsDefinitions;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function hasOption(string $name): bool
    {
        return array_key_exists($name, $this->options);
    }

    public function getOption(string $name, mixed $default = null): mixed
    {
        return array_key_exists($name, $this->options) ? $this->options[$name] : $default;
    }

    public function getDispatcher(): EventDispatcherInterface
    {
        return $this->dispatcher;
    }
}