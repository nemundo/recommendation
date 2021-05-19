<?php

namespace Nemundo\Db\Sql\Field;

// SqlField bzw. DataField
class Field extends AbstractField
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
     * @var string
     */
    public $aliasFieldName;

}