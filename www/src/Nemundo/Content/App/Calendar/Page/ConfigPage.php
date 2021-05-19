<?php

namespace Nemundo\Content\App\Calendar\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Calendar\Content\Calendar\CalendarContentType;
use Nemundo\Content\App\Calendar\Template\CalendarTemplate;
use Nemundo\Content\Index\Tree\Com\Admin\RestrictedContentTypeAdmin;
use Nemundo\Content\Index\Tree\Com\Admin\RestrictedContentTypePerContentTypeAdmin;

class ConfigPage extends CalendarTemplate
{
    public function getContent()
    {

        $container = new RestrictedContentTypePerContentTypeAdmin($this);
        $container->contentTypeId=(new CalendarContentType())->typeId;

        return parent::getContent();
    }
}