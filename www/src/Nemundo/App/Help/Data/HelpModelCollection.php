<?php
namespace Nemundo\App\Help\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class HelpModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\Help\Data\Code\CodeModel());
$this->addModel(new \Nemundo\App\Help\Data\Project\ProjectModel());
$this->addModel(new \Nemundo\App\Help\Data\Topic\TopicModel());
}
}