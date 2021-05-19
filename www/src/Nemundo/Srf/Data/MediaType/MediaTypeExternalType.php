<?php
namespace Nemundo\Srf\Data\MediaType;
class MediaTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $media;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = MediaTypeModel::class;
$this->externalTableName = "srf_media_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->media = new \Nemundo\Model\Type\Text\TextType();
$this->media->fieldName = "media";
$this->media->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->media->externalTableName = $this->externalTableName;
$this->media->aliasFieldName = $this->media->tableName . "_" . $this->media->fieldName;
$this->media->label = "Media";
$this->addType($this->media);

}
}