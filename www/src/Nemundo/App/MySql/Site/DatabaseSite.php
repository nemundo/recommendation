<?php

namespace Nemundo\App\MySql\Site;

use Nemundo\App\MySql\Page\DatabasePage;
use Nemundo\Web\Site\AbstractSite;

class DatabaseSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Database';
        $this->url = 'database';
    }

    public function loadContent()
    {
        (new DatabasePage())->render();
    }
}