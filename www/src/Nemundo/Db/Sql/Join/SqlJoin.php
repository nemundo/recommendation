<?php

namespace Nemundo\Db\Sql\Join;


class SqlJoin extends AbstractSqlJoin
{

    /**
     * @var string
     */
    public $fieldName;

    /**
     * @var string
     */
    public $externalTableName;

    /**
     * @var string
     */
    public $externalAliasTableName;

    /**
     * @var string
     */
    public $externalFieldName = 'id';


}