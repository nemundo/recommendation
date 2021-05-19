<?php

namespace Nemundo\Content\App\Feedback\Content\FeedbackWidget;

use Nemundo\Content\Form\ContentForm;
use Nemundo\Content\Type\AbstractContentType;

class FeedbackWidgetContentType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Feedback Widget';
        $this->typeId = '5b95cfc6-bbb7-44c1-ba6a-f962d31d2dba';
        $this->formClassList[] = ContentForm::class;
        $this->viewClassList[] = FeedbackWidgetContentView::class;
        $this->dataId = 0;
    }


    public function getSubject()
    {
        $subject = 'Feedback';
        return $subject;
    }

}