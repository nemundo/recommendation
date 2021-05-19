<?php

namespace Nemundo\App\UserAdmin\Site;


use Nemundo\App\UserAdmin\Form\UserForm;
use Nemundo\App\UserAdmin\Page\UserNewPage;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class UserNewSite extends AbstractSite
{

    /**
     * @var UserNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'New';
        $this->url = 'new';
        //$this->menuActive = false;

        UserNewSite::$site = $this;
    }


    public function loadContent()
    {

        (new UserNewPage())->render();

        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new UserForm($layout->col1);
        $form->redirectSite = UserAdminSite::$site;


        $page->render();*/

    }

}