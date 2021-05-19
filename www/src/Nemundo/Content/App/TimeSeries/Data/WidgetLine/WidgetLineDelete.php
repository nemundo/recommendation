<?php
namespace Nemundo\Content\App\TimeSeries\Data\WidgetLine;
class WidgetLineDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WidgetLineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetLineModel();
}
}