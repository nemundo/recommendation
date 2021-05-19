<?php
namespace Nemundo\App\Application\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ApplicationModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\Application\Data\Application\ApplicationModel());
$this->addModel(new \Nemundo\App\Application\Data\Project\ProjectModel());
}
}