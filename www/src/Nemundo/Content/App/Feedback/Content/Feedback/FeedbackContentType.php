<?php

namespace Nemundo\Content\App\Feedback\Content\Feedback;

use Nemundo\Content\App\Feedback\Data\Feedback\Feedback;
use Nemundo\Content\App\Feedback\Data\Feedback\FeedbackReader;
use Nemundo\Content\App\Feedback\Data\Feedback\FeedbackRow;
use Nemundo\Content\App\Feedback\Usergroup\FeedbackUsergroup;
use Nemundo\Content\App\Inbox\Type\InboxTrait;
use Nemundo\Content\Type\AbstractContentType;

class FeedbackContentType extends AbstractContentType
{

    use InboxTrait;

    public $contact;

    public $email;

    public $message;


    protected function loadContentType()
    {
        $this->typeLabel = 'Feedback';
        $this->typeId = 'b7877ef2-30cd-4949-9114-825effa625b0';
        $this->formClassList[] = FeedbackContentForm::class;
        $this->viewClassList[] = FeedbackContentView::class;
    }

    protected function onCreate()
    {

        $data=new Feedback();
        $data->contact=$this->contact;
        $data->email=$this->email;
        $data->message=$this->message;
        $this->dataId=$data->save();

        $this->saveContent();

        $this->sendUsergroup(new FeedbackUsergroup());

    }


    protected function onDataRow()
    {
        $this->dataRow=(new FeedbackReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|FeedbackRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }
}