<?php
namespace Nemundo\App\CssDesigner\Data\Style;
class StyleModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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

protected function loadModel() {
$this->tableName = "cssdesigner_style";
$this->aliasTableName = "cssdesigner_style";
$this->label = "Style";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "cssdesigner_style";
$this->id->externalTableName = "cssdesigner_style";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "cssdesigner_style_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->styleTypeId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->styleTypeId->tableName = "cssdesigner_style";
$this->styleTypeId->fieldName = "style_type";
$this->styleTypeId->aliasFieldName = "cssdesigner_style_style_type";
$this->styleTypeId->label = "Style Type";
$this->styleTypeId->allowNullValue = false;

$this->style = new \Nemundo\Model\Type\Text\TextType($this);
$this->style->tableName = "cssdesigner_style";
$this->style->externalTableName = "cssdesigner_style";
$this->style->fieldName = "style";
$this->style->aliasFieldName = "cssdesigner_style_style";
$this->style->label = "Style";
$this->style->allowNullValue = false;
$this->style->length = 255;

}
public function loadStyleType() {
if ($this->styleType == null) {
$this->styleType = new \Nemundo\App\CssDesigner\Data\StyleType\StyleTypeExternalType($this, "cssdesigner_style_style_type");
$this->styleType->tableName = "cssdesigner_style";
$this->styleType->fieldName = "style_type";
$this->styleType->aliasFieldName = "cssdesigner_style_style_type";
$this->styleType->label = "Style Type";
}
return $this;
}
}