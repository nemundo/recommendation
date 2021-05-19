<?php
namespace Nemundo\App\SystemLog\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class SystemLogModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\SystemLog\Data\Log\LogModel());
$this->addModel(new \Nemundo\App\SystemLog\Data\LogType\LogTypeModel());
}
}