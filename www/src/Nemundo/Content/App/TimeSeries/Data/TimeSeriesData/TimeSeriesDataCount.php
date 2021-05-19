<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesData;
class TimeSeriesDataCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TimeSeriesDataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesDataModel();
}
}