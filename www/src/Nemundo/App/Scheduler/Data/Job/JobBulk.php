<?php
namespace Nemundo\App\Scheduler\Data\Job;
class JobBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var JobModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->scriptId, $this->scriptId);
$this->typeValueList->setModelValue($this->model->finished, $this->finished);
$this->typeValueList->setModelValue($this->model->duration, $this->duration);
$this->typeValueList->setModelValue($this->model->statusId, $this->statusId);
$id = parent::save();
return $id;
}
}