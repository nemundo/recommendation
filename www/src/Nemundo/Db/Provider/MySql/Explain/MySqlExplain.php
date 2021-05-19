<?php

namespace Nemundo\Db\Provider\MySql\Explain;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Reader\SqlReader;

class MySqlExplain extends AbstractBase
{

    /**
     * @var string
     */
    public $sql;


    public function getExplain()
    {

        if (!$this->checkProperty('sql')) {
            return;
        }


        $reader = new SqlReader();
        $reader->sqlStatement->sql = 'EXPLAIN ' . $this->sql;

        /** @var MySqlExplainTable[] $list */
        $list = [];

        foreach ($reader->getData() as $row) {

            $explainTable = new MySqlExplainTable();
            $explainTable->tableName = $row->getValue('table');
            $explainTable->selectType = $row->getValue('select_type');
            $explainTable->key = $row->getValue('key');
            $explainTable->rows = $row->getValue('rows');
            $explainTable->extra = $row->getValue('Extra');
            $list[] = $explainTable;

        }

        return $list;

    }

}