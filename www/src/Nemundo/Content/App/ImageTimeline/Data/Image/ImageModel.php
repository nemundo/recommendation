<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Image;
class ImageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $timelineId;

/**
* @var \Nemundo\Content\App\Timeline\Data\Timeline\TimelineExternalType
*/
public $timeline;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $image;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize800;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize1600;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $hash;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

protected function loadModel() {
$this->tableName = "imagetimeline_image";
$this->aliasTableName = "imagetimeline_image";
$this->label = "Image";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "imagetimeline_image";
$this->id->externalTableName = "imagetimeline_image";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "imagetimeline_image_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->timelineId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->timelineId->tableName = "imagetimeline_image";
$this->timelineId->fieldName = "timeline";
$this->timelineId->aliasFieldName = "imagetimeline_image_timeline";
$this->timelineId->label = "Timeline";
$this->timelineId->allowNullValue = false;

$this->image = new \Nemundo\Model\Type\File\ImageType($this);
$this->image->tableName = "imagetimeline_image";
$this->image->externalTableName = "imagetimeline_image";
$this->image->fieldName = "image";
$this->image->aliasFieldName = "imagetimeline_image_image";
$this->image->label = "Image";
$this->image->allowNullValue = false;
$this->imageAutoSize800 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize800->size = 800;
$this->imageAutoSize1600 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize1600->size = 1600;

$this->hash = new \Nemundo\Model\Type\Text\TextType($this);
$this->hash->tableName = "imagetimeline_image";
$this->hash->externalTableName = "imagetimeline_image";
$this->hash->fieldName = "hash";
$this->hash->aliasFieldName = "imagetimeline_image_hash";
$this->hash->label = "Hash";
$this->hash->allowNullValue = false;
$this->hash->length = 36;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "imagetimeline_image";
$this->dateTime->externalTableName = "imagetimeline_image";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "imagetimeline_image_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

}
public function loadTimeline() {
if ($this->timeline == null) {
$this->timeline = new \Nemundo\Content\App\Timeline\Data\Timeline\TimelineExternalType($this, "imagetimeline_image_timeline");
$this->timeline->tableName = "imagetimeline_image";
$this->timeline->fieldName = "timeline";
$this->timeline->aliasFieldName = "imagetimeline_image_timeline";
$this->timeline->label = "Timeline";
}
return $this;
}
}