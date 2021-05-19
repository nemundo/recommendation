<?php
namespace Nemundo\App\Scheduler\Data\SchedulerStatus;
class SchedulerStatusModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $schedulerStatus;

protected function loadModel() {
$this->tableName = "scheduler_status";
$this->aliasTableName = "scheduler_status";
$this->label = "Scheduler Status";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "scheduler_status";
$this->id->externalTableName = "scheduler_status";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "scheduler_status_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->schedulerStatus = new \Nemundo\Model\Type\Text\TextType($this);
$this->schedulerStatus->tableName = "scheduler_status";
$this->schedulerStatus->externalTableName = "scheduler_status";
$this->schedulerStatus->fieldName = "scheduler_status";
$this->schedulerStatus->aliasFieldName = "scheduler_status_scheduler_status";
$this->schedulerStatus->label = "Scheduler Status";
$this->schedulerStatus->allowNullValue = false;
$this->schedulerStatus->length = 255;

}
}