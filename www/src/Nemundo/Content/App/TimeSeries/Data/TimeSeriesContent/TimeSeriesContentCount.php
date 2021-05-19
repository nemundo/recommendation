<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesContent;
class TimeSeriesContentCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TimeSeriesContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesContentModel();
}
}