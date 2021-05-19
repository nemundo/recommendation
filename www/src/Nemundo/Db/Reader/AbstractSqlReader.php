<?php

namespace Nemundo\Db\Reader;

use Nemundo\Db\Base\AbstractDbDataSource;
use Nemundo\Db\Row\DataRow;
use Nemundo\Db\Sql\Parameter\SqlStatement;

abstract class AbstractSqlReader extends AbstractDbDataSource
{

    /**
     * @var SqlStatement
     */
    protected $sqlStatement;

    public function __construct()
    {
        parent::__construct();
        $this->sqlStatement = new SqlStatement();
    }


    protected function loadData()
    {

        if (!$this->checkConnection()) {
            return;
        }

        $list = $this->connection->query($this->sqlStatement);
        foreach ($list as $listRow) {
            $row = new DataRow($listRow);
            $this->list[] = $row;
        }

    }


    /**
     * @return DataRow[]
     */
    public function getData()
    {
        return parent::getData();
    }


    public function getRow()
    {

        $row = [];
        $this->getData();

        if ($this->hasItems()) {
            $row = $this->getData()[0];
        }
        return $row;

    }


    protected function getValue()
    {

        $value = 0;

        $row = $this->getRow();
        if (sizeof($row) > 0) {
            $keys = array_keys($row);
            $value = $row[$keys[0]];
        }
        return $value;

    }

}
