<?php
namespace Nemundo\Content\App\TimeSeries\Data\Line;
class Line extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var LineModel
*/
protected $model;

/**
* @var string
*/
public $timeSeriesId;

/**
* @var string
*/
public $line;

/**
* @var string
*/
public $uniqueName;

public function __construct() {
parent::__construct();
$this->model = new LineModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->timeSeriesId, $this->timeSeriesId);
$this->typeValueList->setModelValue($this->model->line, $this->line);
$this->typeValueList->setModelValue($this->model->uniqueName, $this->uniqueName);
$id = parent::save();
return $id;
}
}