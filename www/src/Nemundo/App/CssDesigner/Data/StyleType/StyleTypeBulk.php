<?php
namespace Nemundo\App\CssDesigner\Data\StyleType;
class StyleTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var StyleTypeModel
*/
protected $model;

/**
* @var string
*/
public $styleType;

public function __construct() {
parent::__construct();
$this->model = new StyleTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->styleType, $this->styleType);
$id = parent::save();
return $id;
}
}