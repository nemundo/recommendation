<?php

namespace Nemundo\Admin\Site;


use Nemundo\App\UserAction\Widget\LoginWidget;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class AdminHomeSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->menuActive = false;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $widget= new LoginWidget($page);
        $widget->showForgotHyperlink=true;
        //$widget->showRegisterHyperlink=true;

        $page->render();

    }

}