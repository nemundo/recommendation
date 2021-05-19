<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesContent;
use Nemundo\Model\Data\AbstractModelUpdate;
class TimeSeriesContentUpdate extends AbstractModelUpdate {
/**
* @var TimeSeriesContentModel
*/
public $model;

/**
* @var string
*/
public $timeSeriesId;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesContentModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->timeSeriesId, $this->timeSeriesId);
parent::update();
}
}