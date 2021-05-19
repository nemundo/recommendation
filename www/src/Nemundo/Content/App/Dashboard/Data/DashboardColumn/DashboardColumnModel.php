<?php
namespace Nemundo\Content\App\Dashboard\Data\DashboardColumn;
class DashboardColumnModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $columnWidth;

protected function loadModel() {
$this->tableName = "dashboard_dashboard_column";
$this->aliasTableName = "dashboard_dashboard_column";
$this->label = "Dashboard Column";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "dashboard_dashboard_column";
$this->id->externalTableName = "dashboard_dashboard_column";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "dashboard_dashboard_column_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->columnWidth = new \Nemundo\Model\Type\Number\NumberType($this);
$this->columnWidth->tableName = "dashboard_dashboard_column";
$this->columnWidth->externalTableName = "dashboard_dashboard_column";
$this->columnWidth->fieldName = "column_width";
$this->columnWidth->aliasFieldName = "dashboard_dashboard_column_column_width";
$this->columnWidth->label = "Column Width";
$this->columnWidth->allowNullValue = true;

}
}