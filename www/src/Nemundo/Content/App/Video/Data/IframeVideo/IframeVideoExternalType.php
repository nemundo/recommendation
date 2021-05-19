<?php
namespace Nemundo\Content\App\Video\Data\IframeVideo;
class IframeVideoExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = IframeVideoModel::class;
$this->externalTableName = "video_iframe_video";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->sourceUrl = new \Nemundo\Model\Type\Text\TextType();
$this->sourceUrl->fieldName = "source_url";
$this->sourceUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sourceUrl->externalTableName = $this->externalTableName;
$this->sourceUrl->aliasFieldName = $this->sourceUrl->tableName . "_" . $this->sourceUrl->fieldName;
$this->sourceUrl->label = "Source Url";
$this->addType($this->sourceUrl);

$this->subject = new \Nemundo\Model\Type\Text\TextType();
$this->subject->fieldName = "subject";
$this->subject->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->subject->externalTableName = $this->externalTableName;
$this->subject->aliasFieldName = $this->subject->tableName . "_" . $this->subject->fieldName;
$this->subject->label = "Subject";
$this->addType($this->subject);

}
}