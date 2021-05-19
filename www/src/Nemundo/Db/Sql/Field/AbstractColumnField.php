<?php

namespace Nemundo\Db\Sql\Field;


// SqlField
// SqlColumn
abstract class AbstractColumnField extends AbstractField
{

    /**
     * @var string
     */
    public $tableName;

    // für Image
    public $externalTableName;


    /**
     * @var string
     */
    public $fieldName;

    /**
     * @var bool
     */
    public $uniqueField = false;

    /**
     * @var bool
     */
    public $quoteName = true;


}