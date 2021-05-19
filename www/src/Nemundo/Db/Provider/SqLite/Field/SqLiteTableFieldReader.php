<?php

namespace Nemundo\Db\Provider\SqLite\Field;

use Nemundo\Db\Base\AbstractDbDataSource;
use Nemundo\Db\Reader\SqlReader;


class SqLiteTableFieldReader extends AbstractDbDataSource
{

    /**
     * @var string
     */
    public $tableName;

    /**
     * @return SqLiteField[]
     */
    public function getData()
    {
        return parent::getData();
    }

    protected function loadData()
    {

        $this->checkProperty('tableName');
        $this->checkConnection();

        $sql = 'PRAGMA table_info("' . $this->tableName . '");';

        $reader = new SqlReader();
        $reader->connection = $this->connection;
        $reader->sqlStatement->sql = $sql;

        foreach ($reader->getData() as $row) {
            $field = new SqLiteField();
            $field->fieldName = $row->getValue('name');
            //$tableField->fieldType = $row->getValue('DATA_TYPE');
            //$tableField->fieldTypeLength = $row->getValue('CHARACTER_MAXIMUM_LENGTH');
            $this->addItem($field);
        }

    }

}