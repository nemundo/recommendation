<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesData;
use Nemundo\Model\Id\AbstractModelIdValue;
class TimeSeriesDataId extends AbstractModelIdValue {
/**
* @var TimeSeriesDataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesDataModel();
}
}