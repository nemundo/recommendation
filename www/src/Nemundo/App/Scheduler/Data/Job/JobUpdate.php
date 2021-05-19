<?php
namespace Nemundo\App\Scheduler\Data\Job;
use Nemundo\Model\Data\AbstractModelUpdate;
class JobUpdate extends AbstractModelUpdate {
/**
* @var JobModel
*/
public $model;

/**
* @var string
*/
public $scriptId;

/**
* @var bool
*/
public $finished;

/**
* @var int
*/
public $duration;

/**
* @var string
*/
public $statusId;

public function __construct() {
parent::__construct();
$this->model = new JobModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->scriptId, $this->scriptId);
$this->typeValueList->setModelValue($this->model->finished, $this->finished);
$this->typeValueList->setModelValue($this->model->duration, $this->duration);
$this->typeValueList->setModelValue($this->model->statusId, $this->statusId);
parent::update();
}
}