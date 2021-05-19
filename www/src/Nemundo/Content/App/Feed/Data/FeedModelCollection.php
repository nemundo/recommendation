<?php
namespace Nemundo\Content\App\Feed\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class FeedModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Feed\Data\CmsFeed\CmsFeedModel());
$this->addModel(new \Nemundo\Content\App\Feed\Data\Enclosure\EnclosureModel());
$this->addModel(new \Nemundo\Content\App\Feed\Data\EnclosureType\EnclosureTypeModel());
$this->addModel(new \Nemundo\Content\App\Feed\Data\Feed\FeedModel());
$this->addModel(new \Nemundo\Content\App\Feed\Data\FeedItem\FeedItemModel());
$this->addModel(new \Nemundo\Content\App\Feed\Data\WebCrawler\WebCrawlerModel());
}
}