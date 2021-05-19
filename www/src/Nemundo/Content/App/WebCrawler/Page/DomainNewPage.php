<?php

namespace Nemundo\Content\App\WebCrawler\Page;

use Nemundo\Content\App\WebCrawler\Content\Domain\DomainContentType;
use Nemundo\Content\App\WebCrawler\Site\WebCrawlerSite;
use Nemundo\Content\App\WebCrawler\Template\WebCrawlerTemplate;

class DomainNewPage extends WebCrawlerTemplate
{
    public function getContent()
    {

        $form = (new DomainContentType())->getDefaultForm($this);
        $form->redirectSite = WebCrawlerSite::$site;

        return parent::getContent();
    }
}