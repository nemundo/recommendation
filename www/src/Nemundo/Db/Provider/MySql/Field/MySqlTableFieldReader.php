<?php

namespace Nemundo\Db\Provider\MySql\Field;

use Nemundo\Core\Type\Number\YesNo;
use Nemundo\Db\Base\AbstractDbDataSource;
use Nemundo\Db\Reader\SqlReader;


class MySqlTableFieldReader extends AbstractDbDataSource
{

    /**
     * @var string
     */
    public $tableName;

    /**
     * @return MySqlField[]
     */
    public function getData()
    {
        return parent::getData();
    }

    protected function loadData()
    {

        $this->checkProperty('tableName');
        $this->checkConnection();

        $sql = 'SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = "' . $this->connection->connectionParameter->database . '" AND TABLE_NAME = "' . $this->tableName . '";';

        $reader = new SqlReader();
        $reader->connection = $this->connection;
        $reader->sqlStatement->sql = $sql;
        foreach ($reader->getData() as $row) {
            $tableField = new MySqlField();
            $tableField->tableName = $this->tableName;
            $tableField->fieldName = $row->getValue('COLUMN_NAME');
            $tableField->fieldType = $row->getValue('DATA_TYPE');
            $tableField->fieldTypeLength = $row->getValue('CHARACTER_MAXIMUM_LENGTH');
            $tableField->allowNull = (new YesNo())->fromText($row->getValue('IS_NULLABLE'))->getValue();
            $tableField->collation = $row->getValue('COLLATION_NAME');
            $tableField->character = $row->getValue('CHARACTER_SET_NAME');

            $this->addItem($tableField);
        }

    }


    public function existsField($fieldName)
    {

        $exists = false;
        foreach ($this->getData() as $mySqlField) {
            if ($mySqlField->fieldName == $fieldName) {
                $exists = true;
            }
        }

        return $exists;

    }

}