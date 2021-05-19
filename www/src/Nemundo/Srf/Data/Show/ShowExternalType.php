<?php
namespace Nemundo\Srf\Data\Show;
class ShowExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $show;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $srfId;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $mediaTypeId;

/**
* @var \Nemundo\Srf\Data\MediaType\MediaTypeExternalType
*/
public $mediaType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ShowModel::class;
$this->externalTableName = "srf_show";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->show = new \Nemundo\Model\Type\Text\TextType();
$this->show->fieldName = "show";
$this->show->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->show->externalTableName = $this->externalTableName;
$this->show->aliasFieldName = $this->show->tableName . "_" . $this->show->fieldName;
$this->show->label = "Show";
$this->addType($this->show);

$this->srfId = new \Nemundo\Model\Type\Text\TextType();
$this->srfId->fieldName = "srf_id";
$this->srfId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->srfId->externalTableName = $this->externalTableName;
$this->srfId->aliasFieldName = $this->srfId->tableName . "_" . $this->srfId->fieldName;
$this->srfId->label = "Srf Id";
$this->addType($this->srfId);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->externalTableName = $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Description";
$this->addType($this->description);

$this->mediaTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->mediaTypeId->fieldName = "media_type";
$this->mediaTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mediaTypeId->aliasFieldName = $this->mediaTypeId->tableName ."_".$this->mediaTypeId->fieldName;
$this->mediaTypeId->label = "Media Type";
$this->addType($this->mediaTypeId);

}
public function loadMediaType() {
if ($this->mediaType == null) {
$this->mediaType = new \Nemundo\Srf\Data\MediaType\MediaTypeExternalType(null, $this->parentFieldName . "_media_type");
$this->mediaType->fieldName = "media_type";
$this->mediaType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mediaType->aliasFieldName = $this->mediaType->tableName ."_".$this->mediaType->fieldName;
$this->mediaType->label = "Media Type";
$this->addType($this->mediaType);
}
return $this;
}
}