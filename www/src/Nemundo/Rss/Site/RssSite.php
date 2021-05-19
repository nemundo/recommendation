<?php


namespace Nemundo\Rss\Site;


use Nemundo\Rss\Page\RssPage;
use Nemundo\Web\Site\AbstractSite;

class RssSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Rss Reader';
        $this->url = 'rss-reader';
    }


    public function loadContent()
    {
        (new RssPage())->render();
    }

}