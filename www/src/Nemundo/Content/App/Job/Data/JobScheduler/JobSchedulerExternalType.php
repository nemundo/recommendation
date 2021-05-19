<?php
namespace Nemundo\Content\App\Job\Data\JobScheduler;
class JobSchedulerExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $done;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $duration;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $finishedDateTime;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = JobSchedulerModel::class;
$this->externalTableName = "job_job_scheduler";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->done = new \Nemundo\Model\Type\Number\YesNoType();
$this->done->fieldName = "done";
$this->done->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->done->externalTableName = $this->externalTableName;
$this->done->aliasFieldName = $this->done->tableName . "_" . $this->done->fieldName;
$this->done->label = "Done";
$this->addType($this->done);

$this->contentId = new \Nemundo\Model\Type\Id\IdType();
$this->contentId->fieldName = "content";
$this->contentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentId->aliasFieldName = $this->contentId->tableName ."_".$this->contentId->fieldName;
$this->contentId->label = "Content";
$this->addType($this->contentId);

$this->duration = new \Nemundo\Model\Type\Number\NumberType();
$this->duration->fieldName = "duration";
$this->duration->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->duration->externalTableName = $this->externalTableName;
$this->duration->aliasFieldName = $this->duration->tableName . "_" . $this->duration->fieldName;
$this->duration->label = "Duration";
$this->addType($this->duration);

$this->finishedDateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->finishedDateTime->fieldName = "finished_date_time";
$this->finishedDateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->finishedDateTime->externalTableName = $this->externalTableName;
$this->finishedDateTime->aliasFieldName = $this->finishedDateTime->tableName . "_" . $this->finishedDateTime->fieldName;
$this->finishedDateTime->label = "Finished Date Time";
$this->addType($this->finishedDateTime);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content");
$this->content->fieldName = "content";
$this->content->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->content->aliasFieldName = $this->content->tableName ."_".$this->content->fieldName;
$this->content->label = "Content";
$this->addType($this->content);
}
return $this;
}
}