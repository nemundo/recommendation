<?php

namespace Nemundo\Content\App\Widget\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Widget\Com\Container\CalendarWeekContainer;

class WidgetPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        new CalendarWeekContainer($this);

        return parent::getContent();
    }
}