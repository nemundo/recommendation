<?php
namespace Nemundo\App\Scheduler\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class SchedulerModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\Scheduler\Data\Job\JobModel());
$this->addModel(new \Nemundo\App\Scheduler\Data\Scheduler\SchedulerModel());
$this->addModel(new \Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogModel());
$this->addModel(new \Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusModel());
}
}