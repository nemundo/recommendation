<?php
namespace Nemundo\Content\App\TimeSeries\Data\WidgetLine;
use Nemundo\Model\Id\AbstractModelIdValue;
class WidgetLineId extends AbstractModelIdValue {
/**
* @var WidgetLineModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetLineModel();
}
}