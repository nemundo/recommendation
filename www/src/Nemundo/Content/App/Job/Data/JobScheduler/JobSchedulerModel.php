<?php
namespace Nemundo\Content\App\Job\Data\JobScheduler;
class JobSchedulerModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $done;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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

protected function loadModel() {
$this->tableName = "job_job_scheduler";
$this->aliasTableName = "job_job_scheduler";
$this->label = "Job Scheduler";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "job_job_scheduler";
$this->id->externalTableName = "job_job_scheduler";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "job_job_scheduler_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->done = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->done->tableName = "job_job_scheduler";
$this->done->externalTableName = "job_job_scheduler";
$this->done->fieldName = "done";
$this->done->aliasFieldName = "job_job_scheduler_done";
$this->done->label = "Done";
$this->done->allowNullValue = true;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "job_job_scheduler";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "job_job_scheduler_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = true;

$this->duration = new \Nemundo\Model\Type\Number\NumberType($this);
$this->duration->tableName = "job_job_scheduler";
$this->duration->externalTableName = "job_job_scheduler";
$this->duration->fieldName = "duration";
$this->duration->aliasFieldName = "job_job_scheduler_duration";
$this->duration->label = "Duration";
$this->duration->allowNullValue = true;

$this->finishedDateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->finishedDateTime->tableName = "job_job_scheduler";
$this->finishedDateTime->externalTableName = "job_job_scheduler";
$this->finishedDateTime->fieldName = "finished_date_time";
$this->finishedDateTime->aliasFieldName = "job_job_scheduler_finished_date_time";
$this->finishedDateTime->label = "Finished Date Time";
$this->finishedDateTime->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "done";
$index->addType($this->done);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "job_job_scheduler_content");
$this->content->tableName = "job_job_scheduler";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "job_job_scheduler_content";
$this->content->label = "Content";
}
return $this;
}
}