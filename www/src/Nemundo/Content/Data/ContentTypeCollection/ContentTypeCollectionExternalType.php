<?php
namespace Nemundo\Content\Data\ContentTypeCollection;
class ContentTypeCollectionExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $collection;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phpClass;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ContentTypeCollectionModel::class;
$this->externalTableName = "content_content_type_collection";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->collection = new \Nemundo\Model\Type\Text\TextType();
$this->collection->fieldName = "collection";
$this->collection->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->collection->externalTableName = $this->externalTableName;
$this->collection->aliasFieldName = $this->collection->tableName . "_" . $this->collection->fieldName;
$this->collection->label = "Collection";
$this->addType($this->collection);

$this->phpClass = new \Nemundo\Model\Type\Text\TextType();
$this->phpClass->fieldName = "php_class";
$this->phpClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->phpClass->externalTableName = $this->externalTableName;
$this->phpClass->aliasFieldName = $this->phpClass->tableName . "_" . $this->phpClass->fieldName;
$this->phpClass->label = "Php Class";
$this->addType($this->phpClass);

}
}