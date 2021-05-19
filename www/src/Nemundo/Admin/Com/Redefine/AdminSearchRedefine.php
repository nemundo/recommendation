<?php

namespace Nemundo\Admin\Com\Redefine;


use Nemundo\Web\Site\AbstractSite;

class AdminSearchRedefine extends AbstractAdminSearchRedefine
{

    public function addItemSite(AbstractSite $site, $count = 0)
    {
        parent::addItemSite($site, $count);
    }

}