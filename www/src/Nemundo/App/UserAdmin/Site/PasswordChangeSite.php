<?php

namespace Nemundo\App\UserAdmin\Site;


use Nemundo\App\UserAdmin\Form\PasswordChangeForm;
use Nemundo\App\UserAdmin\Page\PasswordChangePage;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\User\Parameter\UserParameter;

class PasswordChangeSite extends AbstractIconSite
{

    /**
     * @var PasswordChangeSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Password Change';
        $this->url = 'password-change';

        $this->icon = new FontAwesomeIcon();
        $this->icon->icon = 'key';

        PasswordChangeSite::$site = $this;
    }


    public function loadContent()
    {

        (new PasswordChangePage())->render();

        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new PasswordChangeForm($layout->col1);
        $form->userId = (new UserParameter())->getValue();
        $form->redirectSite = UserAdminSite::$site;

        $page->render();*/

    }

}