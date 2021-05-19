<?php
namespace Nemundo\Content\Data\ContentView;
class ContentViewExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Text\TextType
*/
public $viewName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $viewClass;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $defaultView;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ContentViewModel::class;
$this->externalTableName = "content_view";
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

$this->viewName = new \Nemundo\Model\Type\Text\TextType();
$this->viewName->fieldName = "view_name";
$this->viewName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->viewName->externalTableName = $this->externalTableName;
$this->viewName->aliasFieldName = $this->viewName->tableName . "_" . $this->viewName->fieldName;
$this->viewName->label = "View Name";
$this->addType($this->viewName);

$this->viewClass = new \Nemundo\Model\Type\Text\TextType();
$this->viewClass->fieldName = "view_class";
$this->viewClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->viewClass->externalTableName = $this->externalTableName;
$this->viewClass->aliasFieldName = $this->viewClass->tableName . "_" . $this->viewClass->fieldName;
$this->viewClass->label = "View Class";
$this->addType($this->viewClass);

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType();
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->setupStatus->externalTableName = $this->externalTableName;
$this->setupStatus->aliasFieldName = $this->setupStatus->tableName . "_" . $this->setupStatus->fieldName;
$this->setupStatus->label = "Setup Status";
$this->addType($this->setupStatus);

$this->defaultView = new \Nemundo\Model\Type\Number\YesNoType();
$this->defaultView->fieldName = "default_view";
$this->defaultView->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->defaultView->externalTableName = $this->externalTableName;
$this->defaultView->aliasFieldName = $this->defaultView->tableName . "_" . $this->defaultView->fieldName;
$this->defaultView->label = "Default View";
$this->addType($this->defaultView);

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