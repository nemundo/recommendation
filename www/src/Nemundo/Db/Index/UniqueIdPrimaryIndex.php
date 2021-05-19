<?php

namespace Nemundo\Db\Index;


class UniqueIdPrimaryIndex extends AbstractPrimaryIndex
{

    protected function loadPrimaryIndex()
    {
        $this->primaryIndexId = 'c50854d7-6abf-4176-9e8d-0f2026c3eaad';
        $this->primaryIndexLabel = 'Unique Id';
        $this->primaryIndexName = 'unique_id';
    }

}