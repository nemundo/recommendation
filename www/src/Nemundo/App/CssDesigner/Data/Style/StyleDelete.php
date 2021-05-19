<?php
namespace Nemundo\App\CssDesigner\Data\Style;
class StyleDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var StyleModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StyleModel();
}
}