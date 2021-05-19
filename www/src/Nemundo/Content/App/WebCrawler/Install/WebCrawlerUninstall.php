<?php

namespace Nemundo\Content\App\WebCrawler\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\App\WebCrawler\Data\WebCrawlerModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class WebCrawlerUninstall extends AbstractUninstall
{
    public function uninstall()
    {
        (new ModelCollectionSetup())->removeCollection(new WebCrawlerModelCollection());
    }
}