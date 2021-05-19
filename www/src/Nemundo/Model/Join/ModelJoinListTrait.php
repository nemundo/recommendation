<?php


namespace Nemundo\Model\Join;


trait ModelJoinListTrait
{

    /** @var ModelJoin[] */
    protected $modelJoinList = [];

    public function addModelJoin(ModelJoin $modelJoin)
    {
        $this->modelJoinList[] = $modelJoin;
        return $this;
    }

}