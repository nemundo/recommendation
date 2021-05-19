<?php
namespace Nemundo\Content\App\Project\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ProjectModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Project\Data\Project\ProjectModel());
$this->addModel(new \Nemundo\Content\App\Project\Data\ProjectPhase\ProjectPhaseModel());
}
}