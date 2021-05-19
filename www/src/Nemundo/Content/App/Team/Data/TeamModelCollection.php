<?php
namespace Nemundo\Content\App\Team\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class TeamModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Team\Data\Team\TeamModel());
}
}