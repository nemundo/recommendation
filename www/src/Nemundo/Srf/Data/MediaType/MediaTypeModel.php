<?php
namespace Nemundo\Srf\Data\MediaType;
class MediaTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $media;

protected function loadModel() {
$this->tableName = "srf_media_type";
$this->aliasTableName = "srf_media_type";
$this->label = "Media Type";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "srf_media_type";
$this->id->externalTableName = "srf_media_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "srf_media_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->media = new \Nemundo\Model\Type\Text\TextType($this);
$this->media->tableName = "srf_media_type";
$this->media->externalTableName = "srf_media_type";
$this->media->fieldName = "media";
$this->media->aliasFieldName = "srf_media_type_media";
$this->media->label = "Media";
$this->media->allowNullValue = false;
$this->media->length = 255;

}
}