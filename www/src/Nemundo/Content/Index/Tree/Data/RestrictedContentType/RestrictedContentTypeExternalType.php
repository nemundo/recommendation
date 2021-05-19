<?php
namespace Nemundo\Content\Index\Tree\Data\RestrictedContentType;
class RestrictedContentTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $restrictedContentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $restrictedContentType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = RestrictedContentTypeModel::class;
$this->externalTableName = "tree_restricted_content_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->contentTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentTypeId->aliasFieldName = $this->contentTypeId->tableName ."_".$this->contentTypeId->fieldName;
$this->contentTypeId->label = "Content Type";
$this->addType($this->contentTypeId);

$this->restrictedContentTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->restrictedContentTypeId->fieldName = "restricted_content_type";
$this->restrictedContentTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->restrictedContentTypeId->aliasFieldName = $this->restrictedContentTypeId->tableName ."_".$this->restrictedContentTypeId->fieldName;
$this->restrictedContentTypeId->label = "Restricted Content Type";
$this->addType($this->restrictedContentTypeId);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_content_type");
$this->contentType->fieldName = "content_type";
$this->contentType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentType->aliasFieldName = $this->contentType->tableName ."_".$this->contentType->fieldName;
$this->contentType->label = "Content Type";
$this->addType($this->contentType);
}
return $this;
}
public function loadRestrictedContentType() {
if ($this->restrictedContentType == null) {
$this->restrictedContentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_restricted_content_type");
$this->restrictedContentType->fieldName = "restricted_content_type";
$this->restrictedContentType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->restrictedContentType->aliasFieldName = $this->restrictedContentType->tableName ."_".$this->restrictedContentType->fieldName;
$this->restrictedContentType->label = "Restricted Content Type";
$this->addType($this->restrictedContentType);
}
return $this;
}
}