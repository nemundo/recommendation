<?php

namespace Nemundo\App\UserAction\Site;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\UserAction\Form\UserActivationForm;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\BaseUrlSite;
use Nemundo\Web\WebConfig;

class UserActivationSite extends AbstractSite
{

    /**
     * @var UserActivationSite
     */
    public static $site;


    protected function loadSite()
    {

        $this->title[LanguageCode::EN] = 'User Activation';
        $this->title[LanguageCode::DE] = 'Benutzer Aktivierung';

        $this->url = 'user-activation';
        $this->menuActive = false;

        UserActivationSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new UserActivationForm($layout->col1);
        $form->redirectSite = (new BaseUrlSite());
        //$form->redirectUrl = WebConfig::$webUrl;

        $page->render();

    }
}