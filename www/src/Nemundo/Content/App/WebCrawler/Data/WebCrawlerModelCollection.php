<?php
namespace Nemundo\Content\App\WebCrawler\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WebCrawlerModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\WebCrawler\Data\Domain\DomainModel());
$this->addModel(new \Nemundo\Content\App\WebCrawler\Data\Image\ImageModel());
$this->addModel(new \Nemundo\Content\App\WebCrawler\Data\RssFeed\RssFeedModel());
$this->addModel(new \Nemundo\Content\App\WebCrawler\Data\Url\UrlModel());
}
}