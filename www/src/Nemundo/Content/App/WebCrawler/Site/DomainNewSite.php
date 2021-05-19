<?php

namespace Nemundo\Content\App\WebCrawler\Site;

use Nemundo\Content\App\WebCrawler\Page\DomainNewPage;
use Nemundo\Web\Site\AbstractSite;

class DomainNewSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'New';
        $this->url = 'DomainNew';
    }

    public function loadContent()
    {
        (new DomainNewPage())->render();
    }
}