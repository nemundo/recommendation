<?php


namespace Nemundo\App\MySql\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Provider\MySql\Index\Reader\MySqlIndexReader;

class MySqlIndexTable extends AdminTable
{

    public $tableName;

    public function getContent()
    {

        $header = new AdminTableHeader($this);
        $header->addText('Type');
        $header->addText('Index Name');
        $header->addText('Field');

        $reader = new MySqlIndexReader();
        $reader->tableName = $this->tableName;
        foreach ($reader->getData() as $index) {

            $row = new TableRow($this);
            $row->addText($index-> indexType);
            $row->addText($index->indexName);
            $row->addText($index->columnName);

            /*             $row->addText($index->getValue('index_type'));
                         $row->addText($index->getValue('column_name'));*/


        }

        return parent::getContent();

    }

}