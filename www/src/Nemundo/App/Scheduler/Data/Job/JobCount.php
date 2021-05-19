<?php
namespace Nemundo\App\Scheduler\Data\Job;
class JobCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var JobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JobModel();
}
}