<?php

namespace Nemundo\App\MySql\Site;

use Nemundo\App\MySql\Page\MySqlPage;
use Nemundo\App\MySql\Page\MySqlTablePage;
use Nemundo\App\MySql\Site\Action\DropTableSite;
use Nemundo\App\MySql\Site\Action\EmptyTableSite;
use Nemundo\Web\Site\AbstractSite;

class MySqlTableSite extends AbstractSite
{

    /**
     * @var MySqlTableSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'MySql Table';
        $this->url = 'mysql-table';
        $this->menuActive=false;

        MySqlTableSite::$site=$this;

    }


    public function loadContent()
    {
        (new MySqlTablePage())->render();
    }

}