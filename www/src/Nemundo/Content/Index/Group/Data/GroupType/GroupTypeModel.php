<?php
namespace Nemundo\Content\Index\Group\Data\GroupType;
class GroupTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $groupTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $groupType;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

protected function loadModel() {
$this->tableName = "content_group_type";
$this->aliasTableName = "content_group_type";
$this->label = "Group Type";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_group_type";
$this->id->externalTableName = "content_group_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_group_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->groupTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->groupTypeId->tableName = "content_group_type";
$this->groupTypeId->fieldName = "group_type";
$this->groupTypeId->aliasFieldName = "content_group_type_group_type";
$this->groupTypeId->label = "Group Type";
$this->groupTypeId->allowNullValue = false;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "content_group_type";
$this->setupStatus->externalTableName = "content_group_type";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "content_group_type_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "group_type";
$index->addType($this->groupTypeId);

}
public function loadGroupType() {
if ($this->groupType == null) {
$this->groupType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "content_group_type_group_type");
$this->groupType->tableName = "content_group_type";
$this->groupType->fieldName = "group_type";
$this->groupType->aliasFieldName = "content_group_type_group_type";
$this->groupType->label = "Group Type";
}
return $this;
}
}