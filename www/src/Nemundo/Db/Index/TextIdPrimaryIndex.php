<?php

namespace Nemundo\Db\Index;


class TextIdPrimaryIndex extends AbstractPrimaryIndex
{

    protected function loadPrimaryIndex()
    {
        $this->primaryIndexId = 'f1a8e110-18a4-49f8-ad8b-0413eb3e9bc9';
        $this->primaryIndexLabel = 'Text Id';
        $this->primaryIndexName = 'text_id';
    }

}