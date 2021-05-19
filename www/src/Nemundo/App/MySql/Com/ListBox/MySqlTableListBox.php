<?php


namespace Nemundo\App\MySql\Com\ListBox;


use Nemundo\App\MySql\Parameter\TableParameter;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class MySqlTableListBox extends BootstrapListBox
{

    protected function loadContainer()
    {

        $this->name = (new TableParameter())->parameterName;
        $this->label='Table';

        $reader = new MySqlTableReader();
        foreach ($reader->getData() as $table) {
            $this->addItem($table->tableName, $table->tableName);
        }


    }

}