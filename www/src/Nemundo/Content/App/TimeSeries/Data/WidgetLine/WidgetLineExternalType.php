<?php
namespace Nemundo\Content\App\TimeSeries\Data\WidgetLine;
class WidgetLineExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $lineId;

/**
* @var \Nemundo\Content\App\TimeSeries\Data\Line\LineExternalType
*/
public $line;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = WidgetLineModel::class;
$this->externalTableName = "timeseries_widget_line";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->lineId = new \Nemundo\Model\Type\Id\IdType();
$this->lineId->fieldName = "line";
$this->lineId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->lineId->aliasFieldName = $this->lineId->tableName ."_".$this->lineId->fieldName;
$this->lineId->label = "Line";
$this->addType($this->lineId);

}
public function loadLine() {
if ($this->line == null) {
$this->line = new \Nemundo\Content\App\TimeSeries\Data\Line\LineExternalType(null, $this->parentFieldName . "_line");
$this->line->fieldName = "line";
$this->line->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->line->aliasFieldName = $this->line->tableName ."_".$this->line->fieldName;
$this->line->label = "Line";
$this->addType($this->line);
}
return $this;
}
}