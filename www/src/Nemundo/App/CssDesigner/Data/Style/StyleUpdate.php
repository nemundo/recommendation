<?php
namespace Nemundo\App\CssDesigner\Data\Style;
use Nemundo\Model\Data\AbstractModelUpdate;
class StyleUpdate extends AbstractModelUpdate {
/**
* @var StyleModel
*/
public $model;

/**
* @var string
*/
public $styleTypeId;

/**
* @var string
*/
public $style;

public function __construct() {
parent::__construct();
$this->model = new StyleModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->styleTypeId, $this->styleTypeId);
$this->typeValueList->setModelValue($this->model->style, $this->style);
parent::update();
}
}