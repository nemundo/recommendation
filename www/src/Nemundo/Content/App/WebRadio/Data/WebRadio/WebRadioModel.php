<?php
namespace Nemundo\Content\App\WebRadio\Data\WebRadio;
class WebRadioModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $webRadio;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $streamUrl;

protected function loadModel() {
$this->tableName = "webradio_web_radio";
$this->aliasTableName = "webradio_web_radio";
$this->label = "Web Radio";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webradio_web_radio";
$this->id->externalTableName = "webradio_web_radio";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webradio_web_radio_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->webRadio = new \Nemundo\Model\Type\Text\TextType($this);
$this->webRadio->tableName = "webradio_web_radio";
$this->webRadio->externalTableName = "webradio_web_radio";
$this->webRadio->fieldName = "web_radio";
$this->webRadio->aliasFieldName = "webradio_web_radio_web_radio";
$this->webRadio->label = "Web Radio";
$this->webRadio->allowNullValue = true;
$this->webRadio->length = 255;

$this->streamUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->streamUrl->tableName = "webradio_web_radio";
$this->streamUrl->externalTableName = "webradio_web_radio";
$this->streamUrl->fieldName = "stream_url";
$this->streamUrl->aliasFieldName = "webradio_web_radio_stream_url";
$this->streamUrl->label = "Stream Url";
$this->streamUrl->allowNullValue = true;
$this->streamUrl->length = 255;

}
}