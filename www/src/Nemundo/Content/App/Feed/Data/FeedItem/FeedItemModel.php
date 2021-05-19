<?php
namespace Nemundo\Content\App\Feed\Data\FeedItem;
class FeedItemModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $feedId;

/**
* @var \Nemundo\Content\App\Feed\Data\Feed\FeedExternalType
*/
public $feed;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $imageUrl;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $hasImage;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $hasAudio;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $audioUrl;

protected function loadModel() {
$this->tableName = "feed_item";
$this->aliasTableName = "feed_item";
$this->label = "Feed Item";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "feed_item";
$this->id->externalTableName = "feed_item";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "feed_item_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->feedId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->feedId->tableName = "feed_item";
$this->feedId->fieldName = "feed";
$this->feedId->aliasFieldName = "feed_item_feed";
$this->feedId->label = "Feed";
$this->feedId->allowNullValue = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "feed_item";
$this->title->externalTableName = "feed_item";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "feed_item_title";
$this->title->label = "Title";
$this->title->allowNullValue = false;
$this->title->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "feed_item";
$this->description->externalTableName = "feed_item";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "feed_item_description";
$this->description->label = "Description";
$this->description->allowNullValue = false;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "feed_item";
$this->url->externalTableName = "feed_item";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "feed_item_url";
$this->url->label = "Url";
$this->url->allowNullValue = true;
$this->url->length = 255;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "feed_item";
$this->dateTime->externalTableName = "feed_item";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "feed_item_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->imageUrl->tableName = "feed_item";
$this->imageUrl->externalTableName = "feed_item";
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->aliasFieldName = "feed_item_image_url";
$this->imageUrl->label = "Image Url";
$this->imageUrl->allowNullValue = true;
$this->imageUrl->length = 255;

$this->hasImage = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->hasImage->tableName = "feed_item";
$this->hasImage->externalTableName = "feed_item";
$this->hasImage->fieldName = "has_image";
$this->hasImage->aliasFieldName = "feed_item_has_image";
$this->hasImage->label = "Has Image";
$this->hasImage->allowNullValue = false;

$this->hasAudio = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->hasAudio->tableName = "feed_item";
$this->hasAudio->externalTableName = "feed_item";
$this->hasAudio->fieldName = "has_audio";
$this->hasAudio->aliasFieldName = "feed_item_has_audio";
$this->hasAudio->label = "Has Audio";
$this->hasAudio->allowNullValue = false;

$this->audioUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->audioUrl->tableName = "feed_item";
$this->audioUrl->externalTableName = "feed_item";
$this->audioUrl->fieldName = "audio_url";
$this->audioUrl->aliasFieldName = "feed_item_audio_url";
$this->audioUrl->label = "Audio Url";
$this->audioUrl->allowNullValue = true;
$this->audioUrl->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "url";
$index->addType($this->url);

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "date_time";
$index->addType($this->dateTime);

}
public function loadFeed() {
if ($this->feed == null) {
$this->feed = new \Nemundo\Content\App\Feed\Data\Feed\FeedExternalType($this, "feed_item_feed");
$this->feed->tableName = "feed_item";
$this->feed->fieldName = "feed";
$this->feed->aliasFieldName = "feed_item_feed";
$this->feed->label = "Feed";
}
return $this;
}
}