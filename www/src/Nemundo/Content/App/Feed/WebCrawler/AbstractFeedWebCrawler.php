<?php


namespace Nemundo\Content\App\Feed\WebCrawler;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractFeedWebCrawler extends AbstractBaseClass
{

    abstract public function getFeedItem();

}