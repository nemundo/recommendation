<?php
namespace Nemundo\Content\App\SystemLog\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class SystemLogModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\SystemLog\Data\SystemLog\SystemLogModel());
}
}