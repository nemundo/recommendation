<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseJob;
class TimelapseJobModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $dateTimeTo;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTimeFrom;

protected function loadModel() {
$this->tableName = "imagetimeline_timelapse_job";
$this->aliasTableName = "imagetimeline_timelapse_job";
$this->label = "Timelapse Job";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "imagetimeline_timelapse_job";
$this->id->externalTableName = "imagetimeline_timelapse_job";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "imagetimeline_timelapse_job_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->imageTimelineId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->imageTimelineId->tableName = "imagetimeline_timelapse_job";
$this->imageTimelineId->fieldName = "image_timeline";
$this->imageTimelineId->aliasFieldName = "imagetimeline_timelapse_job_image_timeline";
$this->imageTimelineId->label = "Image Timeline";
$this->imageTimelineId->allowNullValue = false;

$this->dateTimeTo = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTimeTo->tableName = "imagetimeline_timelapse_job";
$this->dateTimeTo->externalTableName = "imagetimeline_timelapse_job";
$this->dateTimeTo->fieldName = "date_time_to";
$this->dateTimeTo->aliasFieldName = "imagetimeline_timelapse_job_date_time_to";
$this->dateTimeTo->label = "Date Time To";
$this->dateTimeTo->allowNullValue = false;

$this->dateTimeFrom = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTimeFrom->tableName = "imagetimeline_timelapse_job";
$this->dateTimeFrom->externalTableName = "imagetimeline_timelapse_job";
$this->dateTimeFrom->fieldName = "date_time_from";
$this->dateTimeFrom->aliasFieldName = "imagetimeline_timelapse_job_date_time_from";
$this->dateTimeFrom->label = "Date Time From";
$this->dateTimeFrom->allowNullValue = false;

}
public function loadImageTimeline() {
if ($this->imageTimeline == null) {
$this->imageTimeline = new \Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineExternalType($this, "imagetimeline_timelapse_job_image_timeline");
$this->imageTimeline->tableName = "imagetimeline_timelapse_job";
$this->imageTimeline->fieldName = "image_timeline";
$this->imageTimeline->aliasFieldName = "imagetimeline_timelapse_job_image_timeline";
$this->imageTimeline->label = "Image Timeline";
}
return $this;
}
}