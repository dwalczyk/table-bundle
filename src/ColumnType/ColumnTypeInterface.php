<?php

namespace DWalczyk\Table\ColumnType;

use DWalczyk\Table\TableCell;
use DWalczyk\Table\View;
use Symfony\Component\OptionsResolver\OptionsResolver;

interface ColumnTypeInterface
{

    public function buildCellView(TableCell $tableColumn): View;

    /**
     * Configures the options for this type.
     */
    public function configureOptions(OptionsResolver $resolver): void;

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "CellType" suffix removed and "label" added (e.g. "ActivationButtonCellType" => "activation_button_label").
     */
    public function getLabelBlockPrefix(): string;

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "CellType" suffix removed and "data" added (e.g. "ActivationButtonCellType" => "activation_button_data").
     */
    public function getDataBlockPrefix(): string;

}