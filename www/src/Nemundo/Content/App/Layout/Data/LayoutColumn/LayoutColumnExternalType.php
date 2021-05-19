<?php
namespace Nemundo\Content\App\Layout\Data\LayoutColumn;
class LayoutColumnExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $columnWidth;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LayoutColumnModel::class;
$this->externalTableName = "layout_layout_column";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->columnWidth = new \Nemundo\Model\Type\Number\NumberType();
$this->columnWidth->fieldName = "column_width";
$this->columnWidth->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->columnWidth->externalTableName = $this->externalTableName;
$this->columnWidth->aliasFieldName = $this->columnWidth->tableName . "_" . $this->columnWidth->fieldName;
$this->columnWidth->label = "Column Width";
$this->addType($this->columnWidth);

}
}