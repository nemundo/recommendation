<?php

namespace Nemundo\Db\Sql\Query;


use Nemundo\Core\Base\AbstractBase;

class FieldNameList extends AbstractBase
{

    private $fieldNameList = [];

    public function addFieldName($fieldName)
    {

        $this->fieldNameList[] = $fieldName;
        return $this;

    }


    public function getFieldName()
    {

        $sql = '';

        foreach ($this->fieldNameList as $fieldName) {

            if ($sql !== '') {
                $sql .= ', ';
            }

            $sql .= '`' . $fieldName . '`';

        }

        return $sql;

    }

}