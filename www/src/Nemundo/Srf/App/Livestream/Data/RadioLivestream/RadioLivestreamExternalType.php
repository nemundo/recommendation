<?php
namespace Nemundo\Srf\App\Livestream\Data\RadioLivestream;
class RadioLivestreamExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = RadioLivestreamModel::class;
$this->externalTableName = "livestream_radio_livestream";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->livestream = new \Nemundo\Model\Type\Text\TextType();
$this->livestream->fieldName = "livestream";
$this->livestream->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->livestream->externalTableName = $this->externalTableName;
$this->livestream->aliasFieldName = $this->livestream->tableName . "_" . $this->livestream->fieldName;
$this->livestream->label = "Livestream";
$this->addType($this->livestream);

$this->urn = new \Nemundo\Model\Type\Text\TextType();
$this->urn->fieldName = "urn";
$this->urn->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->urn->externalTableName = $this->externalTableName;
$this->urn->aliasFieldName = $this->urn->tableName . "_" . $this->urn->fieldName;
$this->urn->label = "Urn";
$this->addType($this->urn);

}
}