<?php

namespace Nemundo\Package\Bootstrap\Layout;


use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class BootstrapTwoColumnLayout extends BootstrapRow
{

    /**
     * @var BootstrapColumn
     */
    public $col1;

    /**
     * @var BootstrapColumn
     */
    public $col2;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->col1 = new BootstrapColumn($this);
        $this->col1->columnWidth = 6;

        $this->col2 = new BootstrapColumn($this);
        $this->col2->columnWidth = 6;

    }

}