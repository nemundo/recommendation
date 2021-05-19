<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageCarousel;
class ImageCarouselModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $imageTimelineId;

/**
* @var \Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineExternalType
*/
public $imageTimeline;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $imageCount;

protected function loadModel() {
$this->tableName = "imagetimeline_image_carousel";
$this->aliasTableName = "imagetimeline_image_carousel";
$this->label = "Image Carousel";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "imagetimeline_image_carousel";
$this->id->externalTableName = "imagetimeline_image_carousel";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "imagetimeline_image_carousel_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->imageTimelineId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->imageTimelineId->tableName = "imagetimeline_image_carousel";
$this->imageTimelineId->fieldName = "image_timeline";
$this->imageTimelineId->aliasFieldName = "imagetimeline_image_carousel_image_timeline";
$this->imageTimelineId->label = "Image Timeline";
$this->imageTimelineId->allowNullValue = false;

$this->imageCount = new \Nemundo\Model\Type\Number\NumberType($this);
$this->imageCount->tableName = "imagetimeline_image_carousel";
$this->imageCount->externalTableName = "imagetimeline_image_carousel";
$this->imageCount->fieldName = "image_count";
$this->imageCount->aliasFieldName = "imagetimeline_image_carousel_image_count";
$this->imageCount->label = "Image Count";
$this->imageCount->allowNullValue = false;

}
public function loadImageTimeline() {
if ($this->imageTimeline == null) {
$this->imageTimeline = new \Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineExternalType($this, "imagetimeline_image_carousel_image_timeline");
$this->imageTimeline->tableName = "imagetimeline_image_carousel";
$this->imageTimeline->fieldName = "image_timeline";
$this->imageTimeline->aliasFieldName = "imagetimeline_image_carousel_image_timeline";
$this->imageTimeline->label = "Image Timeline";
}
return $this;
}
}