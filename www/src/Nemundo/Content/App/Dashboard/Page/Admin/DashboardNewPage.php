<?php


namespace Nemundo\Content\App\Dashboard\Page\Admin;


use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardEditSite;
use Nemundo\Content\App\Dashboard\Template\DashboardAdminTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;


class DashboardNewPage extends DashboardAdminTemplate
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $form = (new DashboardContentType())->getDefaultForm($layout->col1);
        $form->redirectSite = clone(DashboardEditSite::$site);
        $form->appendContentParameter = true;

        return parent::getContent();

    }

}