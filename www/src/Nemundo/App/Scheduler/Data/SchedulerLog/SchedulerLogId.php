<?php
namespace Nemundo\App\Scheduler\Data\SchedulerLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class SchedulerLogId extends AbstractModelIdValue {
/**
* @var SchedulerLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SchedulerLogModel();
}
}