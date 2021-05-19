<?php

namespace Nemundo\Admin\Com\Table;


use Nemundo\Package\Bootstrap\Table\BootstrapTable;

class AdminTable extends BootstrapTable
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->smallTable = true;
        $this->hover = true;

    }

}