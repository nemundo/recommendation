<?php


namespace Nemundo\Db\Sql\Join;


trait SqlJoinTrait
{

    /**
     * @var SqlJoin[]
     */
    private $joinList = [];

    public function addJoin(AbstractSqlJoin $join)
    {
        $this->joinList[] = $join;
        return $this;
    }


}