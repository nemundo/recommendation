<?php
namespace Nemundo\App\CssDesigner\Data\StyleType;
class StyleTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $styleType;

protected function loadModel() {
$this->tableName = "cssdesigner_style_type";
$this->aliasTableName = "cssdesigner_style_type";
$this->label = "Style Type";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "cssdesigner_style_type";
$this->id->externalTableName = "cssdesigner_style_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "cssdesigner_style_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->styleType = new \Nemundo\Model\Type\Text\TextType($this);
$this->styleType->tableName = "cssdesigner_style_type";
$this->styleType->externalTableName = "cssdesigner_style_type";
$this->styleType->fieldName = "style_type";
$this->styleType->aliasFieldName = "cssdesigner_style_type_style_type";
$this->styleType->label = "Style Type";
$this->styleType->allowNullValue = false;
$this->styleType->length = 20;

}
}