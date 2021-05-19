<?php
namespace Nemundo\Content\App\Job\Data\JobScheduler;
class JobSchedulerDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var JobSchedulerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JobSchedulerModel();
}
}