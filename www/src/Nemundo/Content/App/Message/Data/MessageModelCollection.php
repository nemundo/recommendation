<?php
namespace Nemundo\Content\App\Message\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class MessageModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Message\Data\Message\MessageModel());
}
}