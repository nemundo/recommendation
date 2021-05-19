<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeries;
use Nemundo\Model\Data\AbstractModelUpdate;
class TimeSeriesUpdate extends AbstractModelUpdate {
/**
* @var TimeSeriesModel
*/
public $model;

/**
* @var string
*/
public $timeSeries;

/**
* @var string
*/
public $uniqueName;

/**
* @var string
*/
public $source;

/**
* @var string
*/
public $sourceUrl;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $lastUpdate;

public function __construct() {
parent::__construct();
$this->model = new TimeSeriesModel();
$this->lastUpdate = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function update() {
$this->typeValueList->setModelValue($this->model->timeSeries, $this->timeSeries);
$this->typeValueList->setModelValue($this->model->uniqueName, $this->uniqueName);
$this->typeValueList->setModelValue($this->model->source, $this->source);
$this->typeValueList->setModelValue($this->model->sourceUrl, $this->sourceUrl);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->lastUpdate, $this->typeValueList);
$property->setValue($this->lastUpdate);
parent::update();
}
}