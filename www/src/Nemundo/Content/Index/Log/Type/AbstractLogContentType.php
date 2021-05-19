<?php

namespace Nemundo\Content\Index\Log\Type;

use Nemundo\Content\Index\Log\Data\Log\Log;
use Nemundo\Content\Index\Log\Data\Log\LogUpdate;
use Nemundo\Content\Type\AbstractContentType;

abstract class AbstractLogContentType extends AbstractContentType
{

    public $itemContentId;


    protected function onCreate()
    {
        $data = new Log();
        $data->contentItemId = $this->itemContentId;
        $this->dataId = $data->save();
    }


    protected function onIndex()
    {

        $update = new LogUpdate();
        $update->contentLogId = $this->getContentId();
        $update->updateById($this->getDataId());

    }

}