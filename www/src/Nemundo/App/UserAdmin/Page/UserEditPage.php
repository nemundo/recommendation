<?php

namespace Nemundo\App\UserAdmin\Page;


use Nemundo\App\UserAdmin\Form\UserForm;
use Nemundo\App\UserAdmin\Site\UserAdminSite;
use Nemundo\App\UserAdmin\Template\UserAdminTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\User\Parameter\UserParameter;

class UserEditPage extends UserAdminTemplate
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $form = new UserForm($layout->col1);
        $form->userId = (new UserParameter())->getValue();
        $form->redirectSite = UserAdminSite::$site;

        return parent::getContent();

    }

}