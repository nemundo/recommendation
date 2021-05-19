<?php

namespace Nemundo\Db\Sql\Field;


class WildcardField extends AbstractField
{

    /**
     * @var string
     */
    public $tableName;

    public function getFieldName()
    {

        $tableName = '';
        if ($this->tableName !== null) {
            $tableName = $this->tableName . '.';
        }

        $sql = $tableName . '*';
        return $sql;
    }

}