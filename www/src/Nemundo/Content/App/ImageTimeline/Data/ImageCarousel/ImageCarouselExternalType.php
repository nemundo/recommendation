<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageCarousel;
class ImageCarouselExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ImageCarouselModel::class;
$this->externalTableName = "imagetimeline_image_carousel";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->imageTimelineId = new \Nemundo\Model\Type\Id\IdType();
$this->imageTimelineId->fieldName = "image_timeline";
$this->imageTimelineId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageTimelineId->aliasFieldName = $this->imageTimelineId->tableName ."_".$this->imageTimelineId->fieldName;
$this->imageTimelineId->label = "Image Timeline";
$this->addType($this->imageTimelineId);

$this->imageCount = new \Nemundo\Model\Type\Number\NumberType();
$this->imageCount->fieldName = "image_count";
$this->imageCount->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageCount->externalTableName = $this->externalTableName;
$this->imageCount->aliasFieldName = $this->imageCount->tableName . "_" . $this->imageCount->fieldName;
$this->imageCount->label = "Image Count";
$this->addType($this->imageCount);

}
public function loadImageTimeline() {
if ($this->imageTimeline == null) {
$this->imageTimeline = new \Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineExternalType(null, $this->parentFieldName . "_image_timeline");
$this->imageTimeline->fieldName = "image_timeline";
$this->imageTimeline->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageTimeline->aliasFieldName = $this->imageTimeline->tableName ."_".$this->imageTimeline->fieldName;
$this->imageTimeline->label = "Image Timeline";
$this->addType($this->imageTimeline);
}
return $this;
}
}