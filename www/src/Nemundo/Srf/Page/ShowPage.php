<?php

namespace Nemundo\Srf\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Srf\Data\Show\ShowReader;
use Nemundo\Srf\Template\SrfTemplate;

class ShowPage extends SrfTemplate
{
    public function getContent()
    {

        $table=new AdminTable($this);

        $reader =new ShowReader();

        $header=new AdminTableHeader($table);

        $header->addText($reader->model->show->label);
        $header->addText($reader->model->description->label);
        $header->addText($reader->model->srfId->label);

        foreach ($reader->getData() as $showRow) {

            $row=new AdminTableRow($table);
            $row->addText($showRow->show);
            $row->addText($showRow->description);
            $row->addText($showRow->srfId);


        }



        return parent::getContent();


    }
}