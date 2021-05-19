<?php
namespace Nemundo\App\CssDesigner\Data\StyleType;
class StyleTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var StyleTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StyleTypeModel();
}
}