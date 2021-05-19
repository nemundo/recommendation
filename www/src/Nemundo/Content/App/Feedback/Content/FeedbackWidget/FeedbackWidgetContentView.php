<?php

namespace Nemundo\Content\App\Feedback\Content\FeedbackWidget;

use Nemundo\Content\App\Feedback\Content\Feedback\FeedbackContentType;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;

class FeedbackWidgetContentView extends AbstractContentView
{
    /**
     * @var FeedbackWidgetContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='18fc2f18-464c-4094-8d30-7b7f11874bbf';
        $this->defaultView=true;

    }


    public function getContent()
    {

/*
        $p=new Paragraph($this);
        $p->content = 'Please give us some Feedback';*/

        (new FeedbackContentType())->getDefaultForm($this);

        return parent::getContent();

    }
}