<?php
namespace Nemundo\App\Scheduler\Data\SchedulerStatus;
class SchedulerStatusExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $schedulerStatus;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = SchedulerStatusModel::class;
$this->externalTableName = "scheduler_status";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->schedulerStatus = new \Nemundo\Model\Type\Text\TextType();
$this->schedulerStatus->fieldName = "scheduler_status";
$this->schedulerStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->schedulerStatus->externalTableName = $this->externalTableName;
$this->schedulerStatus->aliasFieldName = $this->schedulerStatus->tableName . "_" . $this->schedulerStatus->fieldName;
$this->schedulerStatus->label = "Scheduler Status";
$this->addType($this->schedulerStatus);

}
}