<?php

namespace Nemundo\Content\App\Calendar\Content\CalendarWidget;

use Nemundo\Content\Form\ContentForm;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;

class CalendarWidgetContentType extends AbstractContentType
{

    protected function loadContentType()
    {
        $this->typeLabel = 'Calendar Widget';
        $this->typeId = 'b96740b2-3d6a-49a1-b187-3cb2af5ba354';
        //$this->formClassList[] = CalendarWidgetContentForm::class;
        $this->formClassList[]=ContentForm::class;
        $this->viewClassList[] = CalendarWidgetContentView::class;
        $this->dataId=0;
    }

}