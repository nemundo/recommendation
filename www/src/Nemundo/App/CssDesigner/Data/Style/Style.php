<?php
namespace Nemundo\App\CssDesigner\Data\Style;
class Style extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var StyleModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->styleTypeId, $this->styleTypeId);
$this->typeValueList->setModelValue($this->model->style, $this->style);
$id = parent::save();
return $id;
}
}