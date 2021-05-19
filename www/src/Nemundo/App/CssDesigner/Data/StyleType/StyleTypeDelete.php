<?php
namespace Nemundo\App\CssDesigner\Data\StyleType;
class StyleTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var StyleTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StyleTypeModel();
}
}