<?php

namespace Nemundo\App\SqLite\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Db\Provider\SqLite\Field\SqLiteTableFieldReader;
use Nemundo\Db\Reader\DataReader;

class SqLiteDataTable extends AdminTable
{

    use ConnectionTrait;

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var int
     */
    public $limit;

    /**
     * @var bool
     */
    public $hideIdField = false;


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->loadConnection();
    }


    public function getContent()
    {

        $fieldReader = new SqLiteTableFieldReader();
        $fieldReader->connection = $this->connection;
        $fieldReader->tableName = $this->tableName;

        $header = new TableHeader($this);
        foreach ($fieldReader->getData() as $field) {
            $header->addText($field->fieldName);
        }

        $reader = new DataReader();
        $reader->connection = $this->connection;
        $reader->tableName = $this->tableName;
        $reader->limit = $this->limit;

        foreach ($reader->getData() as $item) {
            $row = new TableRow($this);
            foreach ($fieldReader->getData() as $field) {
                $row->addText($item->getValue($field->fieldName));
            }
        }

        return parent::getContent();

    }

}