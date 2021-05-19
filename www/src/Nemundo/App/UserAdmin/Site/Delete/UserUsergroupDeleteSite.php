<?php

namespace Nemundo\App\UserAdmin\Site\Delete;


use Nemundo\App\UserAdmin\Parameter\UserUsergroupParameter;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\User\Data\UserUsergroup\UserUsergroupDelete;
use Nemundo\Core\Http\Url\UrlReferer;

class UserUsergroupDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var UserUsergroupDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'user-usergroup-delete';
        $this->menuActive = false;

        UserUsergroupDeleteSite::$site = $this;
    }

    public function loadContent()
    {

        (new UserUsergroupDelete())->deleteById((new UserUsergroupParameter())->getValue());
        (new UrlReferer())->redirect();

    }

}