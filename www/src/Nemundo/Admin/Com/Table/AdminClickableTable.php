<?php

namespace Nemundo\Admin\Com\Table;


use Nemundo\Package\Bootstrap\Table\BootstrapClickableTable;

class AdminClickableTable extends BootstrapClickableTable
{

    public function getContent()
    {

        $this->smallTable = true;
        $this->hover = true;

        return parent::getContent();

    }

}