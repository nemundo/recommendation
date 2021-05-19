<?php
namespace Nemundo\Content\App\WebRadio\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WebRadioModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\WebRadio\Data\WebRadio\WebRadioModel());
}
}