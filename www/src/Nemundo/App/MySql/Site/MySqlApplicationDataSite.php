<?php

namespace Nemundo\App\MySql\Site;


use Nemundo\App\MySql\Page\MySqlApplicationDataPage;
use Nemundo\App\MySql\Site\Action\DropTableSite;
use Nemundo\App\MySql\Site\Action\EmptyTableSite;
use Nemundo\App\MySql\Site\Action\MySqlIndexDeleteSite;
use Nemundo\Web\Site\AbstractSite;


class MySqlApplicationDataSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Application Data';
        $this->url = 'application-data';

        new DropTableSite($this);
        new EmptyTableSite($this);



    }


    public function loadContent()
    {

        (new MySqlApplicationDataPage())->render();

    }

}