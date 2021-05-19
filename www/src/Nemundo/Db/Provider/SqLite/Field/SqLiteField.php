<?php

namespace Nemundo\Db\Provider\SqLite\Field;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Provider\SqLite\Table\SqLiteTable;


class SqLiteField extends AbstractBase
{

    /**
     * @var string
     */
    public $fieldName;

    /**
     * @var SqLiteFieldType
     */
    public $fieldType = SqLiteFieldType::TEXT;

    /**
     * @var string
     */
    public $defaultValue;

    /**
     * @var bool
     */
    public $allowNull = true;

    /**
     * @var string
     */
    private $tableName;

    public function __construct(SqLiteTable $table = null)
    {

        if ($table !== null) {
            $this->tableName = $table->tableName;
            $table->addField($this);
        }

    }


    public function getSql()
    {

        $sql = 'ALTER TABLE `' . $this->tableName . '` ADD `' . $this->fieldName . '` ' . $this->fieldType;

        if (!$this->allowNull) {
            $sql .= ' NOT NULL';
        }

        if ($this->defaultValue!==null) {
            $sql .= ' DEFAULT '.$this->defaultValue;
        }

        $sql .= ';';

        return $sql;

    }

}