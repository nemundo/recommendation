<?php

namespace Nemundo\Db\Provider\SqLite\Table;


use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Index\AutoIncrementIdPrimaryIndex;
use Nemundo\Db\Index\NumberIdPrimaryIndex;
use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Db\Provider\SqLite\Field\SqLiteField;
use Nemundo\Db\Provider\SqLite\Field\SqLiteFieldType;
use Nemundo\Db\Sql\Parameter\SqlStatement;
use Nemundo\Db\Table\AbstractTable;


class SqLiteTable extends AbstractTable
{

    /**
     * @var SqLiteField[]
     */
    private $fieldList = [];

    public function addField(SqLiteField $field)
    {
        $this->fieldList[] = $field;
        return $this;
    }


    public function addTextField($fieldName, $length = null, $allowNull = true)
    {

        if (!$this->existsField($fieldName)) {
            $field = new SqLiteField($this);
            $field->fieldName = $fieldName;
            $field->fieldType = SqLiteFieldType::TEXT;
            $field->allowNull = $allowNull;
            if (!$allowNull) {
                $field->defaultValue = '""';
            }
        }

        return $this;
    }


    public function addLargeTextField($fieldName, $allowNull = false)
    {
        $this->addTextField($fieldName, $allowNull);
    }


    public function addNumberField($fieldName, $allowNull = false)
    {
        if (!$this->existsField($fieldName)) {
            $field = new SqLiteField($this);
            $field->fieldName = $fieldName;
            $field->fieldType = SqLiteFieldType::INTEGER;
            $field->allowNull = $allowNull;
            if (!$allowNull) {
                $field->defaultValue = '0';
            }
        }
        return $this;
    }


    public function addDecimalNumberField($fieldName, $allowNull = false)
    {
        if (!$this->existsField($fieldName)) {
            $field = new SqLiteField($this);
            $field->fieldName = $fieldName;
            $field->fieldType = SqLiteFieldType::REAL;
            $field->allowNull = $allowNull;
            if (!$allowNull) {
                $field->defaultValue = '0';
            }
        }
        return $this;
    }


    public function addYesNoField($fieldName, $allowNull = false)
    {
        $this->addNumberField($fieldName, $allowNull);
        return $this;
    }


    public function addDateField($fieldName, $allowNull = false)
    {
        $this->addTextField($fieldName, $allowNull);
        return $this;
    }


    public function addDateTimeField($fieldName, $allowNull = false)
    {
        $this->addTextField($fieldName, $allowNull);
        return $this;
    }


    public function addTimeField($fieldName, $allowNull = false)
    {
        $this->addTextField($fieldName, $allowNull);
        return $this;
    }


    public function existsField($fieldName)
    {

        $value = false;

        $sql = new SqlStatement();
        $sql->sql = 'SELECT COUNT(*) AS count FROM pragma_table_info("' . $this->tableName . '") WHERE name="' . $fieldName . '"';

        $data = $this->connection->query($sql);

        if ($data[0]['count'] == 1) {
            $value = true;
        }

        return $value;

    }


    public function createTable()
    {

        (new Path())
            ->addPath((new File($this->connection->filename))->getPath())
            ->createPath();

        if (!$this->checkProperty('tableName')) {
            return;
        }

        $primaryIndexDataType = null;

        switch ($this->primaryIndex->getClassName()) {

            case AutoIncrementIdPrimaryIndex::class:
                $primaryIndexDataType = 'INTEGER PRIMARY KEY AUTOINCREMENT';
                break;

            case UniqueIdPrimaryIndex::class:
                $primaryIndexDataType = 'varchar(36) PRIMARY KEY';
                break;

            case NumberIdPrimaryIndex::class:
                $primaryIndexDataType = 'INTEGER PRIMARY KEY';
                break;

            case TextIdPrimaryIndex::class:
                $primaryIndexDataType = 'varchar(36) PRIMARY KEY';
                break;

        }

        $sqlParameter = new SqlStatement();
        $sqlParameter->sql = 'CREATE TABLE IF NOT EXISTS `' . $this->tableName . '` (`id` ' . $primaryIndexDataType . ');';

        $this->connection->execute($sqlParameter);

        foreach ($this->fieldList as $field) {
            $sqlParameter = new SqlStatement();
            $sqlParameter->sql = $field->getSql();
            $this->connection->execute($sqlParameter);
        }

        foreach ($this->indexList as $index) {

            // Sqlite needs a unique index name
            $index->indexName = 'index_' . $this->tableName . '_' . $index->indexName;

            $sqlParameter = new SqlStatement();
            $sqlParameter->sql = $index->getSql();
            $this->connection->execute($sqlParameter);
        }

    }


    public function renameTable($newTableName)
    {

        $sqlParameter = new SqlStatement();
        $sqlParameter->sql = 'ALTER TABLE `' . $this->tableName . '` RENAME TO `' . $newTableName . '`;';
        $this->connection->execute($sqlParameter);

    }

    public function dropTable()
    {

        $sqlParameter = new SqlStatement();
        $sqlParameter->sql = 'DROP TABLE `' . $this->tableName . '`;';
        $this->connection->execute($sqlParameter);

    }


    public function renameTableField($fieldName, $newFieldName)
    {

    }

}