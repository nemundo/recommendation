<?php

namespace Nemundo\Package\Bootstrap\Table;


use Nemundo\Html\Table\Table;


class BootstrapTable extends Table
{

    /**
     * @var bool
     */
    public $smallTable = false;

    /**
     * @var bool
     */
    public $hover = false;

    /**
     * @var bool
     */
    public $inverse = false;

    /**
     * @var bool
     */
    public $striped = false;

    public function getContent()
    {

        $this->addCssClass('table');

        if ($this->smallTable) {
            $this->addCssClass('table-sm');
        }

        if ($this->hover) {
            $this->addCssClass('table-hover');
        }

        if ($this->inverse) {
            $this->addCssClass('table-inverse');
        }

        if ($this->striped) {
            $this->addCssClass('table-striped');
        }

        return parent::getContent();

    }

}