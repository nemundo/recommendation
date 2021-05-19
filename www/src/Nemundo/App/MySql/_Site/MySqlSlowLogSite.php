<?php


namespace Nemundo\App\MySql\Site;


use Nemundo\App\MySql\Page\SlowLogPage;
use Nemundo\Web\Site\AbstractSite;

class MySqlSlowLogSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'MySql Slow Log';
        $this->url = 'mysql-slow-log';

    }


    public function loadContent()
    {

        (new SlowLogPage())->render();

    }

}