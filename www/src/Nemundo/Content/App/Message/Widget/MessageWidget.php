<?php


namespace Nemundo\Content\App\Message\Widget;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Content\App\Message\Content\Message\MessageContentType;

class MessageWidget extends AbstractAdminWidget
{


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->widgetTitle = 'Message';
    }


    public function getContent()
    {


        (new MessageContentType())->getDefaultForm($this);

        return parent::getContent();

    }

}