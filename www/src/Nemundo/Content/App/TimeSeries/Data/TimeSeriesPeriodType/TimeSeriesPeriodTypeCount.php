<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType;
class TimeSeriesPeriodTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TimeSeriesPeriodTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesPeriodTypeModel();
}
}