<?php
namespace Nemundo\App\Scheduler\Data\SchedulerStatus;
use Nemundo\Model\Id\AbstractModelIdValue;
class SchedulerStatusId extends AbstractModelIdValue {
/**
* @var SchedulerStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerStatusModel();
}
}