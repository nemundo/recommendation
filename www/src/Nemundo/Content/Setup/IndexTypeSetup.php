<?php


namespace Nemundo\Content\Setup;


use Nemundo\Content\Data\IndexType\IndexType;
use Nemundo\Content\Type\Index\AbstractIndexType;
use Nemundo\Core\Base\AbstractBase;

class IndexTypeSetup extends AbstractBase
{

    public function addIndexType(AbstractIndexType $indexType)
    {

        $data = new IndexType();
        $data->updateOnDuplicate = true;
        $data->id = $indexType->indexId;
        $data->indexType = $indexType->indexLabel;
        $data->save();

    }

}