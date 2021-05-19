<?php

namespace Nemundo\Content\App\Message\Content\Message;

use Nemundo\Content\App\Inbox\Type\InboxTrait;
use Nemundo\Content\App\Message\Data\Message\Message;
use Nemundo\Content\App\Message\Data\Message\MessageReader;
use Nemundo\Content\App\Message\Data\Message\MessageRow;
use Nemundo\Content\Type\AbstractContentType;


class MessageContentType extends AbstractContentType
{

    use InboxTrait;

    public $toId;

    public $message;


    protected function loadContentType()
    {
        $this->typeLabel = 'Message';
        $this->typeId = '80a7e1a2-61d7-435c-8457-b168e472b54a';
        $this->formClassList[] = MessageContentForm::class;
        $this->viewClassList[]  = MessageContentView::class;
    }

    protected function onCreate()
    {

        $data = new Message();
        $data->toId = $this->toId;
        $data->message = $this->message;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {
    }


    protected function onIndex()
    {

        $this->saveInbox();

    }


    protected function onDataRow()
    {
        $this->dataRow = (new MessageReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|MessageRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getUserId()
    {
        return $this->getDataRow()->toId;
    }


}