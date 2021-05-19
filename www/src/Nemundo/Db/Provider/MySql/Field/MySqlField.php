<?php

namespace Nemundo\Db\Provider\MySql\Field;

use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Db\Reader\SqlReader;
use Nemundo\Db\Sql\Parameter\SqlStatement;

class MySqlField extends AbstractDbBase
{

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var string
     */
    public $fieldName;

    /**
     * @var MySqlFieldType
     */
    public $fieldType = MySqlFieldType::VARCHAR_255;

    /**
     * @var int
     */
    public $fieldTypeLength;

    /**
     * @var string
     */
    public $defaultValue;

    /**
     * @var bool
     */
    public $allowNull = false;

    public $collation;

    public $character;

    public function __construct(MySqlTable $mySqlTable = null)
    {

        parent::__construct();

        if ($mySqlTable !== null) {
            $mySqlTable->addField($this);
            $this->tableName = $mySqlTable->tableName;
        }

    }


    public function getSql()
    {

        $sql = $this->internalSql('ADD');
        return $sql;

    }


    public function getModifySql()
    {

        $sql = $this->internalSql('MODIFY');
        return $sql;

    }


    private function internalSql($mode)
    {

        $sql = 'ALTER TABLE `' . $this->tableName . '` ' . $mode . ' `' . $this->fieldName . '` ' . $this->fieldType;

        if (!$this->allowNull) {
            $sql .= ' NOT NULL';
        }

        if ($this->defaultValue !== null) {
            $sql .= ' DEFAULT ' . $this->defaultValue;
        }

        $sql .= ';';

        return $sql;

    }


    public function createField()
    {

        $sqlParameter = new SqlStatement();
        $sqlParameter->sql = $this->getSql();

        $this->connection->execute($sqlParameter);

    }


    public function modifyField()
    {

        $sqlParameter = new SqlStatement();
        $sqlParameter->sql = $this->internalSql('MODIFY');

        $this->connection->execute($sqlParameter);

    }


    public function existsField()
    {

        $value = false;

        $sql = 'SELECT COUNT(1) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = "' . $this->connection->connectionParameter->database . '"' .
            ' AND TABLE_NAME = "' . $this->tableName . '"' .
            ' AND COLUMN_NAME = "' . $this->fieldName . '";';

        $reader = new SqlReader();
        $reader->connection = $this->connection;
        $reader->sqlStatement->sql = $sql;
        foreach ($reader->getData() as $row) {
            if ($row->getValueByNumber(0) == 1) {
                $value = true;
            }
        }

        return $value;

    }


    public function dropField()
    {

        if ($this->existsField()) {

            $sql = 'ALTER TABLE `' . $this->tableName . '` DROP COLUMN `' . $this->fieldName . '`;';

            $sqlParameter = new SqlStatement();
            $sqlParameter->sql = $sql;
            $this->connection->execute($sqlParameter);

        }

        return $this;

    }

}