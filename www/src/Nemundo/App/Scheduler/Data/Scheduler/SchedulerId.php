<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
use Nemundo\Model\Id\AbstractModelIdValue;
class SchedulerId extends AbstractModelIdValue {
/**
* @var SchedulerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerModel();
}
}