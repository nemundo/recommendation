<?php
namespace Nemundo\Content\App\Webcam\Data\WebcamImage;
class WebcamImageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $webcamId;

/**
* @var \Nemundo\Content\App\Webcam\Data\Webcam\WebcamExternalType
*/
public $webcam;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $image;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $hash;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

protected function loadModel() {
$this->tableName = "webcam_webcam_image";
$this->aliasTableName = "webcam_webcam_image";
$this->label = "Webcam Image";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_webcam_image";
$this->id->externalTableName = "webcam_webcam_image";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_webcam_image_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->webcamId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->webcamId->tableName = "webcam_webcam_image";
$this->webcamId->fieldName = "webcam";
$this->webcamId->aliasFieldName = "webcam_webcam_image_webcam";
$this->webcamId->label = "Webcam";
$this->webcamId->allowNullValue = true;

$this->image = new \Nemundo\Model\Type\File\ImageType($this);
$this->image->tableName = "webcam_webcam_image";
$this->image->externalTableName = "webcam_webcam_image";
$this->image->fieldName = "image";
$this->image->aliasFieldName = "webcam_webcam_image_image";
$this->image->label = "Image";
$this->image->allowNullValue = true;

$this->hash = new \Nemundo\Model\Type\Text\TextType($this);
$this->hash->tableName = "webcam_webcam_image";
$this->hash->externalTableName = "webcam_webcam_image";
$this->hash->fieldName = "hash";
$this->hash->aliasFieldName = "webcam_webcam_image_hash";
$this->hash->label = "Hash";
$this->hash->allowNullValue = true;
$this->hash->length = 255;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "webcam_webcam_image";
$this->dateTime->externalTableName = "webcam_webcam_image";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "webcam_webcam_image_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "hash";
$index->addType($this->hash);

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "webcam_date_time";
$index->addType($this->webcamId);
$index->addType($this->dateTime);

}
public function loadWebcam() {
if ($this->webcam == null) {
$this->webcam = new \Nemundo\Content\App\Webcam\Data\Webcam\WebcamExternalType($this, "webcam_webcam_image_webcam");
$this->webcam->tableName = "webcam_webcam_image";
$this->webcam->fieldName = "webcam";
$this->webcam->aliasFieldName = "webcam_webcam_image_webcam";
$this->webcam->label = "Webcam";
}
return $this;
}
}