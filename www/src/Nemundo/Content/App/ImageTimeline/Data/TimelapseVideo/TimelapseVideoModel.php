<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseVideo;
class TimelapseVideoModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "imagetimeline_timelapse_video";
$this->aliasTableName = "imagetimeline_timelapse_video";
$this->label = "Timelapse Video";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "imagetimeline_timelapse_video";
$this->id->externalTableName = "imagetimeline_timelapse_video";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "imagetimeline_timelapse_video_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->imageTimelineId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->imageTimelineId->tableName = "imagetimeline_timelapse_video";
$this->imageTimelineId->fieldName = "image_timeline";
$this->imageTimelineId->aliasFieldName = "imagetimeline_timelapse_video_image_timeline";
$this->imageTimelineId->label = "Image Timeline";
$this->imageTimelineId->allowNullValue = false;

$this->dateTimeFrom = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTimeFrom->tableName = "imagetimeline_timelapse_video";
$this->dateTimeFrom->externalTableName = "imagetimeline_timelapse_video";
$this->dateTimeFrom->fieldName = "date_time_from";
$this->dateTimeFrom->aliasFieldName = "imagetimeline_timelapse_video_date_time_from";
$this->dateTimeFrom->label = "Date Time From";
$this->dateTimeFrom->allowNullValue = false;

$this->dateTimeTo = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTimeTo->tableName = "imagetimeline_timelapse_video";
$this->dateTimeTo->externalTableName = "imagetimeline_timelapse_video";
$this->dateTimeTo->fieldName = "date_time_to";
$this->dateTimeTo->aliasFieldName = "imagetimeline_timelapse_video_date_time_to";
$this->dateTimeTo->label = "Date Time To";
$this->dateTimeTo->allowNullValue = false;

$this->video = new \Nemundo\Model\Type\File\FileType($this);
$this->video->tableName = "imagetimeline_timelapse_video";
$this->video->externalTableName = "imagetimeline_timelapse_video";
$this->video->fieldName = "video";
$this->video->aliasFieldName = "imagetimeline_timelapse_video_video";
$this->video->label = "Video";
$this->video->allowNullValue = false;

}
public function loadImageTimeline() {
if ($this->imageTimeline == null) {
$this->imageTimeline = new \Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineExternalType($this, "imagetimeline_timelapse_video_image_timeline");
$this->imageTimeline->tableName = "imagetimeline_timelapse_video";
$this->imageTimeline->fieldName = "image_timeline";
$this->imageTimeline->aliasFieldName = "imagetimeline_timelapse_video_image_timeline";
$this->imageTimeline->label = "Image Timeline";
}
return $this;
}
}