<?php

namespace Nemundo\Db\Provider\MySql\Index;

use Nemundo\Db\Index\AbstractIndex;


abstract class AbstractMySqlIndex extends AbstractIndex
{


    /**
     * @var MySqlIndexType
     */
    protected $indexType = MySqlIndexType::INDEX;


    public function getSql()
    {

        $this->checkProperty('tableName');

        if ($this->indexName == null) {
            $this->indexName = implode('_', $this->fieldList);
        }

        $indexFieldName = '';
        foreach ($this->fieldList as $fieldName) {
            if ($indexFieldName !== '') {
                $indexFieldName .= ',';
            }
            $indexFieldName .= '`' . $fieldName . '`';
        }

        $indexType = $this->indexType;
        if ($this->indexType == MySqlIndexType::INDEX) {
            $indexType = '';
        }

        $sql = 'CREATE ' . $indexType . ' INDEX `' . $this->indexName . '` ON `' . $this->tableName . '` (' . $indexFieldName . ');';

        return $sql;

    }

}
