<?php

namespace Nemundo\Content\App\Calendar\Page;

use Nemundo\Content\App\Calendar\Content\Calendar\CalendarContentType;
use Nemundo\Content\App\Calendar\Site\CalendarSite;
use Nemundo\Content\App\Calendar\Template\CalendarTemplate;
use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Index\Group\Session\UserGroupSession;
use Nemundo\Core\Debug\Debug;


class CalendarNewPage extends CalendarTemplate
{
    public function getContent()
    {


        $container = new ContentTypeFormContainer($this);
        $container->contentType = new CalendarContentType();
        $container->redirectSite = CalendarSite::$site;

        //(new Debug())->write((new UserSessionType())->userId);
        //(new Debug())->write((new UserGroupSession())->getGroupId());


        //(new UserGroupSession())->getGroupId()

        //(new UserGroupSession())

        /*
        $contentType = new CalendarContentType();
        //$contentType->groupId = (new UserGroupSession())->getGroupId();
        $form = $contentType->getDefaultForm($this);
        $form->redirectSite = CalendarSite::$site;*/


        return parent::getContent();
    }
}