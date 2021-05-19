<?php
namespace Nemundo\Content\App\Job\Data\Job;
class JobModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $job;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

protected function loadModel() {
$this->tableName = "job_job";
$this->aliasTableName = "job_job";
$this->label = "Job";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "job_job";
$this->id->externalTableName = "job_job";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "job_job_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->job = new \Nemundo\Model\Type\Text\TextType($this);
$this->job->tableName = "job_job";
$this->job->externalTableName = "job_job";
$this->job->fieldName = "job";
$this->job->aliasFieldName = "job_job_job";
$this->job->label = "Job";
$this->job->allowNullValue = true;
$this->job->length = 255;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "job_job";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "job_job_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content_type";
$index->addType($this->contentTypeId);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "job_job_content_type");
$this->contentType->tableName = "job_job";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "job_job_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}