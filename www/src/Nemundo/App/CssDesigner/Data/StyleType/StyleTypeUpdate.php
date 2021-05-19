<?php
namespace Nemundo\App\CssDesigner\Data\StyleType;
use Nemundo\Model\Data\AbstractModelUpdate;
class StyleTypeUpdate extends AbstractModelUpdate {
/**
* @var StyleTypeModel
*/
public $model;

/**
* @var string
*/
public $styleType;

public function __construct() {
parent::__construct();
$this->model = new StyleTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->styleType, $this->styleType);
parent::update();
}
}