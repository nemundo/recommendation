<?php

namespace Nemundo\Content\App\Message\Content\Message;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;

class MessageContentView extends AbstractContentView
{
    /**
     * @var MessageContentType
     */
    public $contentType;


    protected function loadView()
    {
        // TODO: Implement loadView() method.
    }


    public function getContent()
    {

        $messageRow=$this->contentType->getDataRow();

        $p=new Paragraph($this);
        $p->content=$messageRow->message;

        return parent::getContent();
    }
}