<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesData;
class TimeSeriesDataValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TimeSeriesDataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesDataModel();
}
}