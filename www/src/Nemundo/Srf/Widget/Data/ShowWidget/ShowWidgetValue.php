<?php
namespace Nemundo\Srf\Widget\Data\ShowWidget;
class ShowWidgetValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ShowWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ShowWidgetModel();
}
}