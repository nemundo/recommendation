<?php
namespace Nemundo\Content\Index\Search\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class SearchModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\Index\Search\Data\SearchIndex\SearchIndexModel());
$this->addModel(new \Nemundo\Content\Index\Search\Data\SearchLog\SearchLogModel());
$this->addModel(new \Nemundo\Content\Index\Search\Data\Word\WordModel());
$this->addModel(new \Nemundo\Content\Index\Search\Data\WordContentType\WordContentTypeModel());
}
}