<?php
namespace Nemundo\App\Script\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ScriptModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\Script\Data\Script\ScriptModel());
}
}