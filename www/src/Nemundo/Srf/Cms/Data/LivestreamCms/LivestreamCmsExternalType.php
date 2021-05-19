<?php
namespace Nemundo\Srf\Cms\Data\LivestreamCms;
class LivestreamCmsExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $livestreamId;

/**
* @var \ExternalType
*/
public $livestream;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LivestreamCmsModel::class;
$this->externalTableName = "cms_livestream_cms";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->livestreamId = new \Nemundo\Model\Type\Id\IdType();
$this->livestreamId->fieldName = "livestream";
$this->livestreamId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->livestreamId->aliasFieldName = $this->livestreamId->tableName ."_".$this->livestreamId->fieldName;
$this->livestreamId->label = "Livestream";
$this->addType($this->livestreamId);

}
public function loadLivestream() {
if ($this->livestream == null) {
$this->livestream = new \ExternalType(null, $this->parentFieldName . "_livestream");
$this->livestream->fieldName = "livestream";
$this->livestream->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->livestream->aliasFieldName = $this->livestream->tableName ."_".$this->livestream->fieldName;
$this->livestream->label = "Livestream";
$this->addType($this->livestream);
}
return $this;
}
}