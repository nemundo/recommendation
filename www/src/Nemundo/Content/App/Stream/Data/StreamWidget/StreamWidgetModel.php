<?php
namespace Nemundo\Content\App\Stream\Data\StreamWidget;
class StreamWidgetModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $limit;

protected function loadModel() {
$this->tableName = "stream_stream_widget";
$this->aliasTableName = "stream_stream_widget";
$this->label = "Stream Widget";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "stream_stream_widget";
$this->id->externalTableName = "stream_stream_widget";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "stream_stream_widget_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->limit = new \Nemundo\Model\Type\Number\NumberType($this);
$this->limit->tableName = "stream_stream_widget";
$this->limit->externalTableName = "stream_stream_widget";
$this->limit->fieldName = "limit";
$this->limit->aliasFieldName = "stream_stream_widget_limit";
$this->limit->label = "Limit";
$this->limit->allowNullValue = false;

}
}