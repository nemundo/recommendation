<?php
namespace Nemundo\Content\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ContentModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\Data\ApplicationContentType\ApplicationContentTypeModel());
$this->addModel(new \Nemundo\Content\Data\Content\ContentModel());
$this->addModel(new \Nemundo\Content\Data\ContentAction\ContentActionModel());
$this->addModel(new \Nemundo\Content\Data\ContentIndex\ContentIndexModel());
$this->addModel(new \Nemundo\Content\Data\ContentType\ContentTypeModel());
$this->addModel(new \Nemundo\Content\Data\ContentTypeCollection\ContentTypeCollectionModel());
$this->addModel(new \Nemundo\Content\Data\ContentTypeCollectionContentType\ContentTypeCollectionContentTypeModel());
$this->addModel(new \Nemundo\Content\Data\ContentView\ContentViewModel());
$this->addModel(new \Nemundo\Content\Data\IndexType\IndexTypeModel());
$this->addModel(new \Nemundo\Content\Data\ViewContentType\ViewContentTypeModel());
}
}