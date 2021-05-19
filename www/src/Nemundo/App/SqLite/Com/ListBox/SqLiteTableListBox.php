<?php

namespace Nemundo\App\SqLite\Com\ListBox;


use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Db\Provider\SqLite\Table\SqLiteTableReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class SqLiteTableListBox extends BootstrapListBox
{

    use ConnectionTrait;

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->loadConnection();
        $this->name = 'table';
        $this->label = 'Table';
    }


    public function getContent()
    {

        $reader = new SqLiteTableReader();
        $reader->connection = $this->connection;

        foreach ($reader->getData() as $table) {
            $this->addItem($table->tableName,$table->tableName);
        }

        $this->value = $this->getValue();

        return parent::getContent();
    }

}