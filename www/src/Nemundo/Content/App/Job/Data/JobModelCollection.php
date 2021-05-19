<?php
namespace Nemundo\Content\App\Job\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class JobModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Job\Data\Job\JobModel());
$this->addModel(new \Nemundo\Content\App\Job\Data\JobScheduler\JobSchedulerModel());
}
}