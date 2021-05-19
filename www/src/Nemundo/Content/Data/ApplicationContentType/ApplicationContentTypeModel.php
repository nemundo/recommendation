<?php
namespace Nemundo\Content\Data\ApplicationContentType;
class ApplicationContentTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $applicationId;

/**
* @var \Nemundo\App\Application\Data\Application\ApplicationExternalType
*/
public $application;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

protected function loadModel() {
$this->tableName = "content_application_content_type";
$this->aliasTableName = "content_application_content_type";
$this->label = "Application Content Type";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_application_content_type";
$this->id->externalTableName = "content_application_content_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_application_content_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->applicationId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->applicationId->tableName = "content_application_content_type";
$this->applicationId->fieldName = "application";
$this->applicationId->aliasFieldName = "content_application_content_type_application";
$this->applicationId->label = "Application";
$this->applicationId->allowNullValue = true;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "content_application_content_type";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "content_application_content_type_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = true;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "content_application_content_type";
$this->setupStatus->externalTableName = "content_application_content_type";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "content_application_content_type_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "application_content_type";
$index->addType($this->applicationId);
$index->addType($this->contentTypeId);

}
public function loadApplication() {
if ($this->application == null) {
$this->application = new \Nemundo\App\Application\Data\Application\ApplicationExternalType($this, "content_application_content_type_application");
$this->application->tableName = "content_application_content_type";
$this->application->fieldName = "application";
$this->application->aliasFieldName = "content_application_content_type_application";
$this->application->label = "Application";
}
return $this;
}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "content_application_content_type_content_type");
$this->contentType->tableName = "content_application_content_type";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "content_application_content_type_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}