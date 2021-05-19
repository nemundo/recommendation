<?php
namespace Nemundo\Content\App\Job\Data\JobScheduler;
use Nemundo\Model\Id\AbstractModelIdValue;
class JobSchedulerId extends AbstractModelIdValue {
/**
* @var JobSchedulerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JobSchedulerModel();
}
}