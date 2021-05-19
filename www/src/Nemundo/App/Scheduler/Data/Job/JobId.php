<?php
namespace Nemundo\App\Scheduler\Data\Job;
use Nemundo\Model\Id\AbstractModelIdValue;
class JobId extends AbstractModelIdValue {
/**
* @var JobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JobModel();
}
}