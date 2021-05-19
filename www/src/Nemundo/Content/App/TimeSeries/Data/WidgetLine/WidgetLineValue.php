<?php
namespace Nemundo\Content\App\TimeSeries\Data\WidgetLine;
class WidgetLineValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WidgetLineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetLineModel();
}
}