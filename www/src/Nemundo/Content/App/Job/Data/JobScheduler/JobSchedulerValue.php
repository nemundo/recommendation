<?php
namespace Nemundo\Content\App\Job\Data\JobScheduler;
class JobSchedulerValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var JobSchedulerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JobSchedulerModel();
}
}