<?php
namespace Nemundo\Content\App\Feed\Data\FeedItem;
class FeedItemExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = FeedItemModel::class;
$this->externalTableName = "feed_item";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->feedId = new \Nemundo\Model\Type\Id\IdType();
$this->feedId->fieldName = "feed";
$this->feedId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->feedId->aliasFieldName = $this->feedId->tableName ."_".$this->feedId->fieldName;
$this->feedId->label = "Feed";
$this->addType($this->feedId);

$this->title = new \Nemundo\Model\Type\Text\TextType();
$this->title->fieldName = "title";
$this->title->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->title->externalTableName = $this->externalTableName;
$this->title->aliasFieldName = $this->title->tableName . "_" . $this->title->fieldName;
$this->title->label = "Title";
$this->addType($this->title);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->externalTableName = $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Description";
$this->addType($this->description);

$this->url = new \Nemundo\Model\Type\Text\TextType();
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->externalTableName = $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName . "_" . $this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType();
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageUrl->externalTableName = $this->externalTableName;
$this->imageUrl->aliasFieldName = $this->imageUrl->tableName . "_" . $this->imageUrl->fieldName;
$this->imageUrl->label = "Image Url";
$this->addType($this->imageUrl);

$this->hasImage = new \Nemundo\Model\Type\Number\YesNoType();
$this->hasImage->fieldName = "has_image";
$this->hasImage->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->hasImage->externalTableName = $this->externalTableName;
$this->hasImage->aliasFieldName = $this->hasImage->tableName . "_" . $this->hasImage->fieldName;
$this->hasImage->label = "Has Image";
$this->addType($this->hasImage);

$this->hasAudio = new \Nemundo\Model\Type\Number\YesNoType();
$this->hasAudio->fieldName = "has_audio";
$this->hasAudio->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->hasAudio->externalTableName = $this->externalTableName;
$this->hasAudio->aliasFieldName = $this->hasAudio->tableName . "_" . $this->hasAudio->fieldName;
$this->hasAudio->label = "Has Audio";
$this->addType($this->hasAudio);

$this->audioUrl = new \Nemundo\Model\Type\Text\TextType();
$this->audioUrl->fieldName = "audio_url";
$this->audioUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->audioUrl->externalTableName = $this->externalTableName;
$this->audioUrl->aliasFieldName = $this->audioUrl->tableName . "_" . $this->audioUrl->fieldName;
$this->audioUrl->label = "Audio Url";
$this->addType($this->audioUrl);

}
public function loadFeed() {
if ($this->feed == null) {
$this->feed = new \Nemundo\Content\App\Feed\Data\Feed\FeedExternalType(null, $this->parentFieldName . "_feed");
$this->feed->fieldName = "feed";
$this->feed->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->feed->aliasFieldName = $this->feed->tableName ."_".$this->feed->fieldName;
$this->feed->label = "Feed";
$this->addType($this->feed);
}
return $this;
}
}