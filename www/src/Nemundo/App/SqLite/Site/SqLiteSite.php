<?php


namespace Nemundo\App\SqLite\Site;


use Nemundo\App\SqLite\Page\SqLitePage;
use Nemundo\App\SqLite\Site\Action\DropTableSite;
use Nemundo\App\SqLite\Site\Action\EmptyTableSite;
use Nemundo\Web\Site\AbstractSite;

class SqLiteSite extends AbstractSite
{

    /**
     * @var SqLiteSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'SqLite';
        $this->url = 'sqlite';

        //new ConfigSite($this);

        new EmptyTableSite($this);
        new DropTableSite($this);

        SqLiteSite::$site = $this;

    }


    public function loadContent()
    {

        (new SqLitePage())->render();

    }

}