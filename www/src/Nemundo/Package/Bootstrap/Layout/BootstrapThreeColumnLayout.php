<?php

namespace Nemundo\Package\Bootstrap\Layout;


use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class BootstrapThreeColumnLayout extends BootstrapRow
{

    /**
     * @var BootstrapColumn
     */
    public $col1;

    /**
     * @var BootstrapColumn
     */
    public $col2;

    /**
     * @var BootstrapColumn
     */
    public $col3;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->col1 = new BootstrapColumn($this);
        $this->col1->columnWidth = 4;

        $this->col2 = new BootstrapColumn($this);
        $this->col2->columnWidth = 4;

        $this->col3 = new BootstrapColumn($this);
        $this->col3->columnWidth = 4;

    }

}