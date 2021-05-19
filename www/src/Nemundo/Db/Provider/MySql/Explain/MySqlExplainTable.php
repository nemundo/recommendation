<?php

namespace Nemundo\Db\Provider\MySql\Explain;


use Nemundo\Core\Base\AbstractBase;

class MySqlExplainTable //extends AbstractBase
{

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var string
     */
    public $selectType;

    /**
     * @var string
     */
    public $key;

    /**
     * @var int
     */
    public $rows;

    /**
     * @var string
     */
    public $extra;

}