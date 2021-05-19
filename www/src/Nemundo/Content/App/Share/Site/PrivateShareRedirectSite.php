<?php

namespace Nemundo\Content\App\Share\Site;

use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\User\Login\SecureTokenLogin;
use Nemundo\User\Parameter\SecureTokenParameter;
use Nemundo\Web\Site\AbstractSite;

class PrivateShareRedirectSite extends AbstractSite
{

    /**
     * @var PrivateShareRedirectSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'PrivateShare-Redirect';
        $this->url = 'private-share-redirect';
        $this->menuActive = false;

        PrivateShareRedirectSite::$site = $this;

    }

    public function loadContent()
    {

        $secureToken = (new SecureTokenParameter())->getValue();
        (new SecureTokenLogin())->checkLogin($secureToken);

        $site = clone(PrivateShareContentSite::$site);
        $site->addParameter(new ContentParameter());
        $site->redirect();

    }

}