<?php
namespace Nemundo\Content\App\TimeSeries\Data\WidgetLine;
class WidgetLineCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WidgetLineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetLineModel();
}
}