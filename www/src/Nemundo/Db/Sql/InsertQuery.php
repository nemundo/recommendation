<?php

namespace Nemundo\Db\Sql;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Db\Sql\Parameter\SqlStatement;


class InsertQuery extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var bool
     */
    public $ignoreIfExists = false;

    /**
     * @var bool
     */
    public $updateOnDuplicate = false;

    /**
     * @var SqlStatement
     */
    private $sqlParameter;

    /**
     * @var string[]
     */
    private $fieldDirectory = [];

    /**
     * @var string[]
     */
    private $keyDirectory = [];

    /**
     * @var string[]
     */
    private $valueDirectory = [];

    /**
     * @var int
     */
    private $keyCount = 0;


    public function __construct()
    {

        $this->sqlParameter = new SqlStatement();

    }


    public function setValue($fieldName, $value)
    {

        $this->addField($fieldName);
        $this->addValue($fieldName, $value);

        return $this;
    }


    public function addField($fieldName)
    {

        $this->fieldDirectory[] = '`' . $fieldName . '`';

        return $this;

    }


    public function addValue($fieldName, $value)
    {

        $keyName = 'key' . $this->keyCount;

        $this->sqlParameter->addParameter($keyName, $value, $fieldName);
        $this->keyDirectory[] = ':' . $keyName;
        $this->keyCount++;

        return $this;

    }

    public function closeValuePart()
    {

        $this->valueDirectory[] = '(' . implode(',', $this->keyDirectory) . ')';
        $this->keyDirectory = [];

        return $this;

    }


    public function getFieldPart()
    {

        $sql = 'INSERT ';

        if ($this->ignoreIfExists) {
            $sql .= 'IGNORE ';

            // Sqlite
            //$sql .= 'OR IGNORE ';
        }

        $sql .= 'INTO `' . $this->tableName . '` (' . implode(',', $this->fieldDirectory) . ') VALUES ';

        return $sql;

    }


    public function getSqlParameter()
    {

        $sql = $this->getFieldPart() . implode(',', $this->valueDirectory);

        if ($this->updateOnDuplicate) {

            $update = '';
            foreach ($this->sqlParameter->getParameterList() as $sqlParameter) {

                if ($sqlParameter->key !== 'id') {
                    if ($update !== '') {
                        $update = $update . ', ';
                    }
                    $update = $update . '`' . $sqlParameter->fieldName . '`=:' . $sqlParameter->key;
                }
            }

            $sql = $sql . ' ON DUPLICATE KEY UPDATE ' . $update;

        }

        $sql .= ';';
        $this->sqlParameter->sql = $sql;

        return $this->sqlParameter;

    }

}
