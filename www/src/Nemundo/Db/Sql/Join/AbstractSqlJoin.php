<?php

namespace Nemundo\Db\Sql\Join;


use Nemundo\Core\Base\AbstractBase;


abstract class AbstractSqlJoin extends AbstractBase
{

    /**
     * @var string
     */
    protected $fieldName;

    /**
     * @var string
     */
    public $externalTableName;

    /**
     * @var string
     */
    protected $externalAliasTableName;

    /**
     * @var string
     */
    protected $externalFieldName = 'id';

    /**
     * @var SqlJoinType
     */
    public $joinType = SqlJoinType::LEFT_JOIN;


    public function getSql()
    {

        $tableName = $this->externalTableName;
        if ($this->externalAliasTableName !== null) {
            $tableName = $this->externalAliasTableName;
        }

        $sql = ' ' . $this->joinType . ' `' . $this->externalTableName . '`';

        if ($this->externalTableName !== null) {
            $sql .= ' ' . $this->externalAliasTableName;
        }

        $sql .= ' ON ' . $this->fieldName . '=' . $tableName . '.' . $this->externalFieldName;


        return $sql;

    }

}