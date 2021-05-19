<?php
namespace Nemundo\App\CssDesigner\Data\Style;
class StyleCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var StyleModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StyleModel();
}
}