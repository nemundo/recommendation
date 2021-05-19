<?php
namespace Nemundo\Content\App\Video\Data\IframeVideo;
class IframeVideoModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $sourceUrl;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

protected function loadModel() {
$this->tableName = "video_iframe_video";
$this->aliasTableName = "video_iframe_video";
$this->label = "Iframe Video";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "video_iframe_video";
$this->id->externalTableName = "video_iframe_video";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "video_iframe_video_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->sourceUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->sourceUrl->tableName = "video_iframe_video";
$this->sourceUrl->externalTableName = "video_iframe_video";
$this->sourceUrl->fieldName = "source_url";
$this->sourceUrl->aliasFieldName = "video_iframe_video_source_url";
$this->sourceUrl->label = "Source Url";
$this->sourceUrl->allowNullValue = false;
$this->sourceUrl->length = 255;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "video_iframe_video";
$this->subject->externalTableName = "video_iframe_video";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "video_iframe_video_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = false;
$this->subject->length = 255;

}
}