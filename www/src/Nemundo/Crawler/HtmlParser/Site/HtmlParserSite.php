<?php


namespace Nemundo\Crawler\HtmlParser\Site;


use Nemundo\Crawler\HtmlParser\Page\HtmlParserPage;
use Nemundo\Web\Site\AbstractSite;

class HtmlParserSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Html Parser';
        $this->url = 'html-parser';
    }


    public function loadContent()
    {
        (new HtmlParserPage())->render();
    }

}