<?php
namespace Nemundo\Content\App\Log\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class LogModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Log\Data\LogMessage\LogMessageModel());
}
}