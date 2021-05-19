<?php
namespace Nemundo\Content\App\PublicShare\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class PublicShareModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShareModel());
}
}