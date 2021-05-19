<?php
namespace Nemundo\App\CssDesigner\Data\StyleType;
class StyleTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var StyleTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StyleTypeModel();
}
}