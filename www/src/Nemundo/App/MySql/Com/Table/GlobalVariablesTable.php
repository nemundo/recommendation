<?php


namespace Nemundo\App\MySql\Com\Table;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Db\Reader\SqlReader;

class GlobalVariablesTable extends AdminLabelValueTable
{

    public function getContent()
    {

        $reader=new SqlReader();
        $reader->sqlStatement->sql='SHOW VARIABLES';
        foreach ($reader->getData() as $row) {
            //$this->addLabelValue($row->getValue('Variable_name'),$row->getValue('Value'));
            $this->addLabelValue($row->getValue('Variable_name'),$row->getValue('Value'));
        }

        return parent::getContent();

    }

}