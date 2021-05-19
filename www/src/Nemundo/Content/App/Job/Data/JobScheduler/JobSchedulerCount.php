<?php
namespace Nemundo\Content\App\Job\Data\JobScheduler;
class JobSchedulerCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var JobSchedulerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JobSchedulerModel();
}
}