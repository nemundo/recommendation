<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesWidget;
use Nemundo\Model\Id\AbstractModelIdValue;
class TimeSeriesWidgetId extends AbstractModelIdValue {
/**
* @var TimeSeriesWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesWidgetModel();
}
}