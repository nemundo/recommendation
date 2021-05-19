<?php
namespace Nemundo\Content\App\Stream\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class StreamModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Stream\Data\Stream\StreamModel());
$this->addModel(new \Nemundo\Content\App\Stream\Data\StreamWidget\StreamWidgetModel());
$this->addModel(new \Nemundo\Content\App\Stream\Data\UserStream\UserStreamModel());
}
}