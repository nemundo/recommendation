<?php

namespace Nemundo\App\UserAction\Page;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\UserAction\Form\UserRegistrationForm;
use Nemundo\App\UserAction\UserActionConfig;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\BaseUrlSite;

class UserRegistrationPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $widget = new AdminWidget($layout->col1);
        $widget->widgetTitle = 'User Registration';

        $form = new UserRegistrationForm($widget);
        $form->redirectSite = new BaseUrlSite();
        $form->defaultUsergroupList = UserActionConfig::$defaultUsergroupList;

        return parent::getContent();

    }

}