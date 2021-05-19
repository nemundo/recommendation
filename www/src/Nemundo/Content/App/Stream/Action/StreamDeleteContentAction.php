<?php

namespace Nemundo\Content\App\Stream\Action;


use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\App\Stream\Data\Stream\Stream;
use Nemundo\Content\App\Stream\Data\Stream\StreamDelete;

class StreamDeleteContentAction extends AbstractContentAction
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Stream Delete Action';
        $this->typeId = '47576989-927b-4929-950a-b31f17892cda';
        $this->actionLabel = 'Delete Stream';

    }


    public function onAction()
    {

        $delete = new StreamDelete();
        $delete->filter->andEqual($delete->model->contentId, $this->actionContentId);
        $delete->delete();

    }

}