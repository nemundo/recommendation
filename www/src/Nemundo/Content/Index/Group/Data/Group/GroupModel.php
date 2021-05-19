<?php
namespace Nemundo\Content\Index\Group\Data\Group;
class GroupModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $group;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $groupTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $groupType;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

protected function loadModel() {
$this->tableName = "content_group";
$this->aliasTableName = "content_group";
$this->label = "Group";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_group";
$this->id->externalTableName = "content_group";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_group_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->group = new \Nemundo\Model\Type\Text\TextType($this);
$this->group->tableName = "content_group";
$this->group->externalTableName = "content_group";
$this->group->fieldName = "group";
$this->group->aliasFieldName = "content_group_group";
$this->group->label = "Group";
$this->group->allowNullValue = false;
$this->group->length = 255;

$this->groupTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->groupTypeId->tableName = "content_group";
$this->groupTypeId->fieldName = "group_type";
$this->groupTypeId->aliasFieldName = "content_group_group_type";
$this->groupTypeId->label = "Group Type";
$this->groupTypeId->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "content_group";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "content_group_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "group_type";
$index->addType($this->groupTypeId);

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

}
public function loadGroupType() {
if ($this->groupType == null) {
$this->groupType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "content_group_group_type");
$this->groupType->tableName = "content_group";
$this->groupType->fieldName = "group_type";
$this->groupType->aliasFieldName = "content_group_group_type";
$this->groupType->label = "Group Type";
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "content_group_content");
$this->content->tableName = "content_group";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "content_group_content";
$this->content->label = "Content";
}
return $this;
}
}