<?php
namespace Nemundo\Content\App\Explorer\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ExplorerModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Explorer\Data\Container\ContainerModel());
$this->addModel(new \Nemundo\Content\App\Explorer\Data\ContainerRename\ContainerRenameModel());
$this->addModel(new \Nemundo\Content\App\Explorer\Data\ExplorerContentType\ExplorerContentTypeModel());
}
}