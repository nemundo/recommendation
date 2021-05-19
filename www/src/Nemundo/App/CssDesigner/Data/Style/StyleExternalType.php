<?php
namespace Nemundo\App\CssDesigner\Data\Style;
class StyleExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $styleTypeId;

/**
* @var \Nemundo\App\CssDesigner\Data\StyleType\StyleTypeExternalType
*/
public $styleType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $style;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = StyleModel::class;
$this->externalTableName = "cssdesigner_style";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->styleTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->styleTypeId->fieldName = "style_type";
$this->styleTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->styleTypeId->aliasFieldName = $this->styleTypeId->tableName ."_".$this->styleTypeId->fieldName;
$this->styleTypeId->label = "Style Type";
$this->addType($this->styleTypeId);

$this->style = new \Nemundo\Model\Type\Text\TextType();
$this->style->fieldName = "style";
$this->style->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->style->externalTableName = $this->externalTableName;
$this->style->aliasFieldName = $this->style->tableName . "_" . $this->style->fieldName;
$this->style->label = "Style";
$this->addType($this->style);

}
public function loadStyleType() {
if ($this->styleType == null) {
$this->styleType = new \Nemundo\App\CssDesigner\Data\StyleType\StyleTypeExternalType(null, $this->parentFieldName . "_style_type");
$this->styleType->fieldName = "style_type";
$this->styleType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->styleType->aliasFieldName = $this->styleType->tableName ."_".$this->styleType->fieldName;
$this->styleType->label = "Style Type";
$this->addType($this->styleType);
}
return $this;
}
}