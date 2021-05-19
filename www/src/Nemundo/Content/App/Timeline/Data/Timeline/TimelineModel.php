<?php
namespace Nemundo\Content\App\Timeline\Data\Timeline;
class TimelineModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $date;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

protected function loadModel() {
$this->tableName = "timeline_timeline";
$this->aliasTableName = "timeline_timeline";
$this->label = "Timeline";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "timeline_timeline";
$this->id->externalTableName = "timeline_timeline";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "timeline_timeline_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "timeline_timeline";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "timeline_timeline_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "timeline_timeline";
$this->dateTime->externalTableName = "timeline_timeline";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "timeline_timeline_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->date = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->date->tableName = "timeline_timeline";
$this->date->externalTableName = "timeline_timeline";
$this->date->fieldName = "date";
$this->date->aliasFieldName = "timeline_timeline_date";
$this->date->label = "Date";
$this->date->allowNullValue = false;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "timeline_timeline";
$this->subject->externalTableName = "timeline_timeline";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "timeline_timeline_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = false;
$this->subject->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "date_time";
$index->addType($this->dateTime);

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "date";
$index->addType($this->date);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "timeline_timeline_content");
$this->content->tableName = "timeline_timeline";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "timeline_timeline_content";
$this->content->label = "Content";
}
return $this;
}
}