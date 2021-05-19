<?php
namespace Nemundo\Srf\App\Livestream\Data\RadioLivestream;
class RadioLivestreamModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $livestream;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $urn;

protected function loadModel() {
$this->tableName = "livestream_radio_livestream";
$this->aliasTableName = "livestream_radio_livestream";
$this->label = "Radio Livestream";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "livestream_radio_livestream";
$this->id->externalTableName = "livestream_radio_livestream";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "livestream_radio_livestream_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->livestream = new \Nemundo\Model\Type\Text\TextType($this);
$this->livestream->tableName = "livestream_radio_livestream";
$this->livestream->externalTableName = "livestream_radio_livestream";
$this->livestream->fieldName = "livestream";
$this->livestream->aliasFieldName = "livestream_radio_livestream_livestream";
$this->livestream->label = "Livestream";
$this->livestream->allowNullValue = false;
$this->livestream->length = 255;

$this->urn = new \Nemundo\Model\Type\Text\TextType($this);
$this->urn->tableName = "livestream_radio_livestream";
$this->urn->externalTableName = "livestream_radio_livestream";
$this->urn->fieldName = "urn";
$this->urn->aliasFieldName = "livestream_radio_livestream_urn";
$this->urn->label = "Urn";
$this->urn->allowNullValue = false;
$this->urn->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "urn";
$index->addType($this->urn);

}
}