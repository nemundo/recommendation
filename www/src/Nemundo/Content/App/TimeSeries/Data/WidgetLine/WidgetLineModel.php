<?php
namespace Nemundo\Content\App\TimeSeries\Data\WidgetLine;
class WidgetLineModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $lineId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\Line\LineExternalType
*/
public $line;

protected function loadModel() {
$this->tableName = "timeseries_widget_line";
$this->aliasTableName = "timeseries_widget_line";
$this->label = "Widget Line";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "timeseries_widget_line";
$this->id->externalTableName = "timeseries_widget_line";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "timeseries_widget_line_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->lineId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->lineId->tableName = "timeseries_widget_line";
$this->lineId->fieldName = "line";
$this->lineId->aliasFieldName = "timeseries_widget_line_line";
$this->lineId->label = "Line";
$this->lineId->allowNullValue = true;

}
public function loadLine() {
if ($this->line == null) {
$this->line = new \Nemundo\Content\App\TimeSeries\Data\Line\LineExternalType($this, "timeseries_widget_line_line");
$this->line->tableName = "timeseries_widget_line";
$this->line->fieldName = "line";
$this->line->aliasFieldName = "timeseries_widget_line_line";
$this->line->label = "Line";
}
return $this;
}
}