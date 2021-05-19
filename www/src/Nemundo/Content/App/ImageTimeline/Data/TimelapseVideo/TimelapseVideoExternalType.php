<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo;
class TimelapseVideoExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTimeFrom;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTimeTo;

/**
* @var \Nemundo\Model\Type\File\FileType
*/
public $video;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TimelapseVideoModel::class;
$this->externalTableName = "imagetimeline_timelapse_video";
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

$this->dateTimeFrom = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTimeFrom->fieldName = "date_time_from";
$this->dateTimeFrom->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeFrom->externalTableName = $this->externalTableName;
$this->dateTimeFrom->aliasFieldName = $this->dateTimeFrom->tableName . "_" . $this->dateTimeFrom->fieldName;
$this->dateTimeFrom->label = "Date Time From";
$this->addType($this->dateTimeFrom);

$this->dateTimeTo = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTimeTo->fieldName = "date_time_to";
$this->dateTimeTo->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeTo->externalTableName = $this->externalTableName;
$this->dateTimeTo->aliasFieldName = $this->dateTimeTo->tableName . "_" . $this->dateTimeTo->fieldName;
$this->dateTimeTo->label = "Date Time To";
$this->addType($this->dateTimeTo);

$this->video = new \Nemundo\Model\Type\File\FileType();
$this->video->fieldName = "video";
$this->video->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->video->externalTableName = $this->externalTableName;
$this->video->aliasFieldName = $this->video->tableName . "_" . $this->video->fieldName;
$this->video->label = "Video";
$this->addType($this->video);

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