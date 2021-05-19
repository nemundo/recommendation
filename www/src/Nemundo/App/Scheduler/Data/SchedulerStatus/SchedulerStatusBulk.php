<?php
namespace Nemundo\App\Scheduler\Data\SchedulerStatus;
class SchedulerStatusBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var SchedulerStatusModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var string
*/
public $schedulerStatus;

public function __construct() {
parent::__construct();
$this->model = new SchedulerStatusModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->schedulerStatus, $this->schedulerStatus);
$id = parent::save();
return $id;
}
}