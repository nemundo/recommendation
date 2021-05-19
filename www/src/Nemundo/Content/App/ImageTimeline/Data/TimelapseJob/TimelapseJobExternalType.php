<?php
namespace Nemundo\Content\App\ImageTimeline\Data\TimelapseJob;
class TimelapseJobExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
public $dateTimeTo;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTimeFrom;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TimelapseJobModel::class;
$this->externalTableName = "imagetimeline_timelapse_job";
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

$this->dateTimeTo = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTimeTo->fieldName = "date_time_to";
$this->dateTimeTo->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeTo->externalTableName = $this->externalTableName;
$this->dateTimeTo->aliasFieldName = $this->dateTimeTo->tableName . "_" . $this->dateTimeTo->fieldName;
$this->dateTimeTo->label = "Date Time To";
$this->addType($this->dateTimeTo);

$this->dateTimeFrom = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTimeFrom->fieldName = "date_time_from";
$this->dateTimeFrom->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeFrom->externalTableName = $this->externalTableName;
$this->dateTimeFrom->aliasFieldName = $this->dateTimeFrom->tableName . "_" . $this->dateTimeFrom->fieldName;
$this->dateTimeFrom->label = "Date Time From";
$this->addType($this->dateTimeFrom);

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