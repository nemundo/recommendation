<?php

namespace Nemundo\Content\App\Dashboard\Page\Admin;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Calendar\Content\Calendar\CalendarContentType;
use Nemundo\Content\App\Calendar\Template\CalendarTemplate;
use Nemundo\Content\App\Dashboard\Content\DashboardColumn\DashboardColumnContentType;
use Nemundo\Content\App\Dashboard\Template\DashboardAdminTemplate;
use Nemundo\Content\Index\Tree\Com\Admin\RestrictedContentTypeAdmin;
use Nemundo\Content\Index\Tree\Com\Admin\RestrictedContentTypePerContentTypeAdmin;

class ConfigPage extends DashboardAdminTemplate
{
    public function getContent()
    {

        $container = new RestrictedContentTypePerContentTypeAdmin($this);
        $container->contentTypeId=(new DashboardColumnContentType())->typeId;

        return parent::getContent();
    }
}