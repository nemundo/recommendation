<?php
namespace Nemundo\Content\App\Podcast\Data\Episode;
class EpisodeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $podcastId;

/**
* @var \Nemundo\Content\App\Podcast\Data\Podcast\PodcastExternalType
*/
public $podcast;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $text;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $audioUrl;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $length;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = EpisodeModel::class;
$this->externalTableName = "podcast_episode";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->podcastId = new \Nemundo\Model\Type\Id\IdType();
$this->podcastId->fieldName = "podcast";
$this->podcastId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->podcastId->aliasFieldName = $this->podcastId->tableName ."_".$this->podcastId->fieldName;
$this->podcastId->label = "Podcast";
$this->addType($this->podcastId);

$this->title = new \Nemundo\Model\Type\Text\TextType();
$this->title->fieldName = "title";
$this->title->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->title->externalTableName = $this->externalTableName;
$this->title->aliasFieldName = $this->title->tableName . "_" . $this->title->fieldName;
$this->title->label = "Title";
$this->addType($this->title);

$this->text = new \Nemundo\Model\Type\Text\LargeTextType();
$this->text->fieldName = "text";
$this->text->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->text->externalTableName = $this->externalTableName;
$this->text->aliasFieldName = $this->text->tableName . "_" . $this->text->fieldName;
$this->text->label = "Text";
$this->addType($this->text);

$this->audioUrl = new \Nemundo\Model\Type\Text\TextType();
$this->audioUrl->fieldName = "audio_url";
$this->audioUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->audioUrl->externalTableName = $this->externalTableName;
$this->audioUrl->aliasFieldName = $this->audioUrl->tableName . "_" . $this->audioUrl->fieldName;
$this->audioUrl->label = "Audio Url";
$this->addType($this->audioUrl);

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->length = new \Nemundo\Model\Type\Number\NumberType();
$this->length->fieldName = "length";
$this->length->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->length->externalTableName = $this->externalTableName;
$this->length->aliasFieldName = $this->length->tableName . "_" . $this->length->fieldName;
$this->length->label = "Length";
$this->addType($this->length);

}
public function loadPodcast() {
if ($this->podcast == null) {
$this->podcast = new \Nemundo\Content\App\Podcast\Data\Podcast\PodcastExternalType(null, $this->parentFieldName . "_podcast");
$this->podcast->fieldName = "podcast";
$this->podcast->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->podcast->aliasFieldName = $this->podcast->tableName ."_".$this->podcast->fieldName;
$this->podcast->label = "Podcast";
$this->addType($this->podcast);
}
return $this;
}
}