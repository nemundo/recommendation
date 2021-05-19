<?php

namespace Nemundo\Content\App\Calendar\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Calendar\Content\Calendar\CalendarContentType;
use Nemundo\Content\App\Calendar\Parameter\CalendarParameter;
use Nemundo\Content\App\PublicShare\Action\PublicShareAction;
use Nemundo\Content\Com\Widget\ContentWidget;

class CalendarItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $parameter = new CalendarParameter();

        $calendarContent = new CalendarContentType($parameter->getValue());

        $widget = new ContentWidget($this);
        $widget->contentType = $calendarContent;
        $widget->editable=false;
        $widget->viewEditable=false;
        //$widget->actionDropdown->addContentAction(new PublicShareAction());


        return parent::getContent();
    }
}