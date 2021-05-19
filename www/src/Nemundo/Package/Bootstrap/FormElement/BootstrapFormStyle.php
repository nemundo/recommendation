<?php


namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;

trait BootstrapFormStyle
{

    /**
     * @var bool
     */
    public $column = false;

    /**
     * @var int
     */
    public $columnSize;

    protected function loadStyle()
    {

        $this->tagName = 'div';
        $this->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);

        if ($this->column) {
            $this->addCssClass('col');
        }

        if ($this->columnSize !== null) {
            $this->addCssClass('col-' . $this->columnSize);
        }

    }

}