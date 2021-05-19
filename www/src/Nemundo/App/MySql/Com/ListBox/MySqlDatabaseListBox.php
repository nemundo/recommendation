<?php

namespace Nemundo\App\MySql\Com\ListBox;


use Nemundo\App\MySql\Parameter\DatabaseParameter;
use Nemundo\Db\Provider\MySql\Database\MySqlDatabaseReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class MySqlDatabaseListBox extends BootstrapListBox
{

    protected function loadContainer()
    {

        $this->label = 'Database';
        $this->name = (new DatabaseParameter())->getParameterName();
        $database = new MySqlDatabaseReader();
        foreach ($database->getData() as $database) {
            $this->addItem($database->databaseName);
        }

    }

}