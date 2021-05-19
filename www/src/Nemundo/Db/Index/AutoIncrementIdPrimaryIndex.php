<?php

namespace Nemundo\Db\Index;


class AutoIncrementIdPrimaryIndex extends AbstractPrimaryIndex
{

    protected function loadPrimaryIndex()
    {
        $this->primaryIndexId = 'a8c7b958-ba10-42f9-94d1-592d5581f27f';
        $this->primaryIndexLabel = 'Auto Increment';
        $this->primaryIndexName = 'auto_increment';
    }

}