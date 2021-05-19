<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeriesContent;
class TimeSeriesContentBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var TimeSeriesContentModel
*/
protected $model;

/**
* @var string
*/
public $timeSeriesId;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesContentModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->timeSeriesId, $this->timeSeriesId);
$id = parent::save();
return $id;
}
}