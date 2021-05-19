<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeries;
class TimeSeriesCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TimeSeriesModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesModel();
}
}