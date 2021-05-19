<?php
namespace Nemundo\Content\App\Share\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ShareModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Share\Data\PrivateShare\PrivateShareModel());
}
}