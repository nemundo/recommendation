<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType;
class TimeSeriesPeriodTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TimeSeriesPeriodTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesPeriodTypeModel();
}
}