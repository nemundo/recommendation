<?php

namespace Nemundo\Db\Sql\Field;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Db\Reader\AbstractDataReader;

// AbstractSqlField bzw. AbstractDataField
abstract class AbstractField extends AbstractBaseClass
{

    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var string
     */
    protected $fieldName;

    /**
     * @var string
     */
    public $aliasFieldName;


    public function __construct(AbstractDataReader $reader = null)
    {

        if ($reader !== null) {
            $reader->addField($this);
        }
    }


    public function getFieldName()
    {

        $sql = '';

        if ($this->tableName !== null) {
            $sql = $this->tableName . '.';
        }

        $sql = $sql . '`' . $this->fieldName . '`';

        if ($this->aliasFieldName !== null) {
            $sql = $sql . ' `' . $this->aliasFieldName . '`';
        }

        return $sql;


    }


    public function getConditionFieldName()
    {

        $sql = '';

        if ($this->tableName !== null) {
            $sql = $this->tableName . '.';
        }

        $sql = $sql . '`' . $this->fieldName . '`';

        return $sql;

    }


}