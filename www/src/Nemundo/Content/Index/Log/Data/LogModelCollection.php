<?php
namespace Nemundo\Content\Index\Log\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class LogModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\Index\Log\Data\Log\LogModel());
}
}