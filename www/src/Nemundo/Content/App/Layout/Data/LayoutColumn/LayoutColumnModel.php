<?php
namespace Nemundo\Content\App\Layout\Data\LayoutColumn;
class LayoutColumnModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $columnWidth;

protected function loadModel() {
$this->tableName = "layout_layout_column";
$this->aliasTableName = "layout_layout_column";
$this->label = "Layout Column";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "layout_layout_column";
$this->id->externalTableName = "layout_layout_column";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "layout_layout_column_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->columnWidth = new \Nemundo\Model\Type\Number\NumberType($this);
$this->columnWidth->tableName = "layout_layout_column";
$this->columnWidth->externalTableName = "layout_layout_column";
$this->columnWidth->fieldName = "column_width";
$this->columnWidth->aliasFieldName = "layout_layout_column_column_width";
$this->columnWidth->label = "Column Width";
$this->columnWidth->allowNullValue = false;

}
}