<?php

namespace Nemundo\Db\Provider\MySql\Index;


class MySqlFullTextIndex extends AbstractMySqlIndex
{

    protected function loadIndex()
    {
        $this->indexType = MySqlIndexType::FULLTEXT;
    }

}