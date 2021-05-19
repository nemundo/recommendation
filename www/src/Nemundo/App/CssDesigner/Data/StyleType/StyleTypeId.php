<?php
namespace Nemundo\App\CssDesigner\Data\StyleType;
use Nemundo\Model\Id\AbstractModelIdValue;
class StyleTypeId extends AbstractModelIdValue {
/**
* @var StyleTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StyleTypeModel();
}
}