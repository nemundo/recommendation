<?php
namespace Nemundo\Content\Data\IndexType;
class IndexTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $indexType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = IndexTypeModel::class;
$this->externalTableName = "content_index_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->indexType = new \Nemundo\Model\Type\Text\TextType();
$this->indexType->fieldName = "index_type";
$this->indexType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->indexType->externalTableName = $this->externalTableName;
$this->indexType->aliasFieldName = $this->indexType->tableName . "_" . $this->indexType->fieldName;
$this->indexType->label = "Index Type";
$this->addType($this->indexType);

}
}