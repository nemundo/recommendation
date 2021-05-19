<?php

namespace Nemundo\Admin\Usergroup\Site;


use Nemundo\Admin\Usergroup\Parameter\UsergroupParameter;
use Nemundo\Web\Site\AbstractSite;

class UsergroupDeleteUserSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->url = 'delete-user';
    }

    public function loadContent()
    {

        $parameter = new UsergroupParameter();

    }

}