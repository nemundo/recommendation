<?php
namespace Nemundo\Content\App\Stream\Data\StreamWidget;
class StreamWidgetExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $limit;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = StreamWidgetModel::class;
$this->externalTableName = "stream_stream_widget";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->limit = new \Nemundo\Model\Type\Number\NumberType();
$this->limit->fieldName = "limit";
$this->limit->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->limit->externalTableName = $this->externalTableName;
$this->limit->aliasFieldName = $this->limit->tableName . "_" . $this->limit->fieldName;
$this->limit->label = "Limit";
$this->addType($this->limit);

}
}