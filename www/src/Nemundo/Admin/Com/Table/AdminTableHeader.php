<?php

namespace Nemundo\Admin\Com\Table;


use Nemundo\Com\TableBuilder\TableHeader;

class AdminTableHeader extends TableHeader
{

    public function getContent()
    {

        $this->addCssClass('table-light');
        return parent::getContent();

    }


    public function addSorting() {


}


}