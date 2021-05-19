<?php

namespace Nemundo\Model\Definition\Index;


class ModelUniqueIndex extends AbstractModelIndex
{

    protected function loadIndex()
    {
        $this->indexLabel = 'Unique Index';
        $this->indexType = 'unique_index';
        $this->indexId = 'b55b3eaa-3d91-41b5-aea4-6aebd879aa74';
    }

}