<?php

namespace Nemundo\App\MySql\Site;


use Nemundo\App\MySql\Page\MySqlApplicationDataPage;
use Nemundo\App\MySql\Page\SqLiteApplicationDataPage;
use Nemundo\App\MySql\Site\Action\DropTableSite;
use Nemundo\App\MySql\Site\Action\EmptyTableSite;
use Nemundo\Web\Site\AbstractSite;


class SqLiteApplicationDataSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Application Data (SqLite)';
        $this->url = 'application-data-sqlite';

        //new DropTableSite($this);
        //new EmptyTableSite($this);

    }


    public function loadContent()
    {

        (new SqLiteApplicationDataPage())->render();

    }

}