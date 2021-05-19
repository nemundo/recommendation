<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Image;
class ImageExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Text\TextType
*/
public $hash;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ImageModel::class;
$this->externalTableName = "imagetimeline_image";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->timelineId = new \Nemundo\Model\Type\Id\IdType();
$this->timelineId->fieldName = "timeline";
$this->timelineId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->timelineId->aliasFieldName = $this->timelineId->tableName ."_".$this->timelineId->fieldName;
$this->timelineId->label = "Timeline";
$this->addType($this->timelineId);

$this->image = new \Nemundo\Model\Type\File\ImageType();
$this->image->fieldName = "image";
$this->image->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->image->externalTableName = $this->externalTableName;
$this->image->aliasFieldName = $this->image->tableName . "_" . $this->image->fieldName;
$this->image->label = "Image";
$this->addType($this->image);

$this->hash = new \Nemundo\Model\Type\Text\TextType();
$this->hash->fieldName = "hash";
$this->hash->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->hash->externalTableName = $this->externalTableName;
$this->hash->aliasFieldName = $this->hash->tableName . "_" . $this->hash->fieldName;
$this->hash->label = "Hash";
$this->addType($this->hash);

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

}
public function loadTimeline() {
if ($this->timeline == null) {
$this->timeline = new \Nemundo\Content\App\Timeline\Data\Timeline\TimelineExternalType(null, $this->parentFieldName . "_timeline");
$this->timeline->fieldName = "timeline";
$this->timeline->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->timeline->aliasFieldName = $this->timeline->tableName ."_".$this->timeline->fieldName;
$this->timeline->label = "Timeline";
$this->addType($this->timeline);
}
return $this;
}
}