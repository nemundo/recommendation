<?php
namespace Nemundo\App\CssDesigner\Data\Style;
class StyleValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var StyleModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StyleModel();
}
}