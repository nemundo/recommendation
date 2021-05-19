<?php
namespace Nemundo\Content\App\WebRadio\Data\WebRadio;
class WebRadioExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = WebRadioModel::class;
$this->externalTableName = "webradio_web_radio";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->webRadio = new \Nemundo\Model\Type\Text\TextType();
$this->webRadio->fieldName = "web_radio";
$this->webRadio->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->webRadio->externalTableName = $this->externalTableName;
$this->webRadio->aliasFieldName = $this->webRadio->tableName . "_" . $this->webRadio->fieldName;
$this->webRadio->label = "Web Radio";
$this->addType($this->webRadio);

$this->streamUrl = new \Nemundo\Model\Type\Text\TextType();
$this->streamUrl->fieldName = "stream_url";
$this->streamUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->streamUrl->externalTableName = $this->externalTableName;
$this->streamUrl->aliasFieldName = $this->streamUrl->tableName . "_" . $this->streamUrl->fieldName;
$this->streamUrl->label = "Stream Url";
$this->addType($this->streamUrl);

}
}