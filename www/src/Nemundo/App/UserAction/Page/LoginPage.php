<?php

namespace Nemundo\App\UserAction\Page;


use Nemundo\App\UserAction\UserActionConfig;
use Nemundo\App\UserAction\Widget\LoginWidget;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\BaseUrlSite;

class LoginPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $widget = new LoginWidget($layout->col1);
        $widget->showForgotHyperlink = UserActionConfig::$showForgotHyperlink;
        $widget->showRegisterHyperlink = UserActionConfig::$showRegisterHyperlink;
        $widget->redirectSite=new BaseUrlSite();

        return parent::getContent();

    }

}