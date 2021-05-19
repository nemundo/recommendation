<?php
namespace Nemundo\Content\App\Podcast\Data\Episode;
class EpisodeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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

protected function loadModel() {
$this->tableName = "podcast_episode";
$this->aliasTableName = "podcast_episode";
$this->label = "Episode";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "podcast_episode";
$this->id->externalTableName = "podcast_episode";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "podcast_episode_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->podcastId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->podcastId->tableName = "podcast_episode";
$this->podcastId->fieldName = "podcast";
$this->podcastId->aliasFieldName = "podcast_episode_podcast";
$this->podcastId->label = "Podcast";
$this->podcastId->allowNullValue = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "podcast_episode";
$this->title->externalTableName = "podcast_episode";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "podcast_episode_title";
$this->title->label = "Title";
$this->title->allowNullValue = false;
$this->title->length = 255;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "podcast_episode";
$this->text->externalTableName = "podcast_episode";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "podcast_episode_text";
$this->text->label = "Text";
$this->text->allowNullValue = false;

$this->audioUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->audioUrl->tableName = "podcast_episode";
$this->audioUrl->externalTableName = "podcast_episode";
$this->audioUrl->fieldName = "audio_url";
$this->audioUrl->aliasFieldName = "podcast_episode_audio_url";
$this->audioUrl->label = "Audio Url";
$this->audioUrl->allowNullValue = false;
$this->audioUrl->length = 255;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "podcast_episode";
$this->dateTime->externalTableName = "podcast_episode";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "podcast_episode_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->length = new \Nemundo\Model\Type\Number\NumberType($this);
$this->length->tableName = "podcast_episode";
$this->length->externalTableName = "podcast_episode";
$this->length->fieldName = "length";
$this->length->aliasFieldName = "podcast_episode_length";
$this->length->label = "Length";
$this->length->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "podcast_url";
$index->addType($this->podcastId);
$index->addType($this->audioUrl);

}
public function loadPodcast() {
if ($this->podcast == null) {
$this->podcast = new \Nemundo\Content\App\Podcast\Data\Podcast\PodcastExternalType($this, "podcast_episode_podcast");
$this->podcast->tableName = "podcast_episode";
$this->podcast->fieldName = "podcast";
$this->podcast->aliasFieldName = "podcast_episode_podcast";
$this->podcast->label = "Podcast";
}
return $this;
}
}