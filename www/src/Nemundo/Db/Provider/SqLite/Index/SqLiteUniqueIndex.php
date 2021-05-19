<?php

namespace Nemundo\Db\Provider\SqLite\Index;


use Nemundo\Db\Index\AbstractIndex;
use Nemundo\Db\Provider\MySql\Index\MySqlIndexType;

class SqLiteUniqueIndex extends AbstractIndex
{

    protected function loadIndex()
    {
        //$this->indexType = MySqlIndexType::UNIQUE;

    }


    public function getSql()
    {

        /*
        $this->checkProperty('tableName');

        if ($this->indexName == null) {
            $this->indexName = implode('_', $this->fieldList);
        }*/

        $indexFieldName = '';
        foreach ($this->fieldList as $fieldName) {
            if ($indexFieldName !== '') {
                $indexFieldName .= ',';
            }
            $indexFieldName .= '`' . $fieldName . '`';
        }

        /*
        $indexType = $this->indexType;
        if ($this->indexType == MySqlIndexType::INDEX) {
            $indexType = '';
        }*/

        $sql = 'CREATE UNIQUE INDEX IF NOT EXISTS `' . $this->indexName . '` ON `' . $this->tableName . '` (' . $indexFieldName . ');';

        return $sql;


    }

}