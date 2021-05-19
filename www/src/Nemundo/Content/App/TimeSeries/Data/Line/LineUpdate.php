<?php
namespace Nemundo\Content\App\TimeSeries\Data\Line;
use Nemundo\Model\Data\AbstractModelUpdate;
class LineUpdate extends AbstractModelUpdate {
/**
* @var LineModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->timeSeriesId, $this->timeSeriesId);
$this->typeValueList->setModelValue($this->model->line, $this->line);
$this->typeValueList->setModelValue($this->model->uniqueName, $this->uniqueName);
parent::update();
}
}