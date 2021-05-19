<?php
namespace Nemundo\App\CssDesigner\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class CssDesignerModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\CssDesigner\Data\Style\StyleModel());
$this->addModel(new \Nemundo\App\CssDesigner\Data\StyleType\StyleTypeModel());
}
}