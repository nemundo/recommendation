<?php

namespace Nemundo\Content\App\Stream\Action;


use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\App\Stream\Data\Stream\Stream;

class StreamContentAction extends AbstractContentAction
{

    protected function loadContentType()
    {

        $this->typeLabel='Stream Content Action';
        $this->typeId='b0f47f44-c80b-46e1-b01b-3a636ada8edd';
        $this->actionLabel='Send to Stream';

    }


    public function onAction()
    {

        $data=new Stream();
        $data->contentId= $this->actionContentId;
        $data->hasMessage=false;
        $data->active=true;
        $data->save();


    }

}