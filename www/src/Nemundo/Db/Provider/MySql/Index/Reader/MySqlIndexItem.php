<?php

namespace Nemundo\Db\Provider\MySql\Index\Reader;


use Nemundo\Core\Base\AbstractBase;

class MySqlIndexItem extends AbstractBase
{

    public $tableName;

    public $indexName;

    public $columnName;

    public $indexType;


}