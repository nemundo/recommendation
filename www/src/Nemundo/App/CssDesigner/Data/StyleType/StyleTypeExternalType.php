<?php
namespace Nemundo\App\CssDesigner\Data\StyleType;
class StyleTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $styleType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = StyleTypeModel::class;
$this->externalTableName = "cssdesigner_style_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->styleType = new \Nemundo\Model\Type\Text\TextType();
$this->styleType->fieldName = "style_type";
$this->styleType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->styleType->externalTableName = $this->externalTableName;
$this->styleType->aliasFieldName = $this->styleType->tableName . "_" . $this->styleType->fieldName;
$this->styleType->label = "Style Type";
$this->addType($this->styleType);

}
}