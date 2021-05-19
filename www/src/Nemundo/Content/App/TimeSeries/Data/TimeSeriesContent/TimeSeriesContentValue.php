<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesContent;
class TimeSeriesContentValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TimeSeriesContentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesContentModel();
}
}