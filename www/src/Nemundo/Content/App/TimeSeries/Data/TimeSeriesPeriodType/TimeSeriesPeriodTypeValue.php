<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType;
class TimeSeriesPeriodTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TimeSeriesPeriodTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesPeriodTypeModel();
}
}