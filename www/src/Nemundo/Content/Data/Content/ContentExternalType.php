<?php
namespace Nemundo\Content\Data\Content;
class ContentExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ContentModel::class;
$this->externalTableName = "content_content";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->dataId = new \Nemundo\Model\Type\Text\TextType();
$this->dataId->fieldName = "data_id";
$this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dataId->externalTableName = $this->externalTableName;
$this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
$this->dataId->label = "Data Id";
$this->addType($this->dataId);

$this->subject = new \Nemundo\Model\Type\Text\TextType();
$this->subject->fieldName = "subject";
$this->subject->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->subject->externalTableName = $this->externalTableName;
$this->subject->aliasFieldName = $this->subject->tableName . "_" . $this->subject->fieldName;
$this->subject->label = "Subject";
$this->addType($this->subject);

$this->contentTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentTypeId->aliasFieldName = $this->contentTypeId->tableName ."_".$this->contentTypeId->fieldName;
$this->contentTypeId->label = "Content Type";
$this->addType($this->contentTypeId);

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
}