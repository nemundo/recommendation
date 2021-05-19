<?php


namespace Nemundo\Srf\Site;


use Nemundo\Srf\Page\SrfPage;
use Nemundo\Web\Site\AbstractSite;

class SrfSite extends AbstractSite
{

    /**
     * @var SrfSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'SRF';
        $this->url = 'srf';

        new ShowSite($this);


        new SrfEpisodeSite($this);


        SrfSite::$site= $this;

    }


    public function loadContent()
    {
        (new SrfPage())->render();
    }

}