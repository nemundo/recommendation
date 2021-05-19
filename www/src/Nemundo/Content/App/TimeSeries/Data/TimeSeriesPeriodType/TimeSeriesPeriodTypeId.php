<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType;
use Nemundo\Model\Id\AbstractModelIdValue;
class TimeSeriesPeriodTypeId extends AbstractModelIdValue {
/**
* @var TimeSeriesPeriodTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesPeriodTypeModel();
}
}