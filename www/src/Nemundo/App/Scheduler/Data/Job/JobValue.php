<?php
namespace Nemundo\App\Scheduler\Data\Job;
class JobValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var JobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JobModel();
}
}