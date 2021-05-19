<?php
namespace Nemundo\Content\App\TimeSeries\Data\TimeSeries;
class TimeSeries extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TimeSeriesModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->timeSeries, $this->timeSeries);
$this->typeValueList->setModelValue($this->model->uniqueName, $this->uniqueName);
$this->typeValueList->setModelValue($this->model->source, $this->source);
$this->typeValueList->setModelValue($this->model->sourceUrl, $this->sourceUrl);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->lastUpdate, $this->typeValueList);
$property->setValue($this->lastUpdate);
$id = parent::save();
return $id;
}
}