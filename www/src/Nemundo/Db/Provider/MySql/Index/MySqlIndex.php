<?php

namespace Nemundo\Db\Provider\MySql\Index;


class MySqlIndex extends AbstractMySqlIndex
{

    protected function loadIndex()
    {
        $this->indexType = MySqlIndexType::INDEX;
    }


}