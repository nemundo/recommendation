<?php


namespace Nemundo\Content\App\Dashboard\Page\Admin;


use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\App\Dashboard\Content\UserDashboard\UserDashboardContentType;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardEditSite;
use Nemundo\Content\App\Dashboard\Site\Admin\UserDashboardEditSite;
use Nemundo\Content\App\Dashboard\Template\DashboardAdminTemplate;


class UserDashboardNewPage extends AbstractTemplateDocument // DashboardAdminTemplate
{

    public function getContent()
    {


        $form = (new UserDashboardContentType())->getDefaultForm($this);
        $form->redirectSite = clone(UserDashboardEditSite::$site);
        $form->appendParameter = true;


        return parent::getContent();

    }

}