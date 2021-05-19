<?php
namespace Nemundo\Content\App\Podcast\Data\Podcast;
class PodcastModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $rssUrl;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $podcast;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

protected function loadModel() {
$this->tableName = "podcast_podcast";
$this->aliasTableName = "podcast_podcast";
$this->label = "Podcast";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "podcast_podcast";
$this->id->externalTableName = "podcast_podcast";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "podcast_podcast_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->rssUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->rssUrl->tableName = "podcast_podcast";
$this->rssUrl->externalTableName = "podcast_podcast";
$this->rssUrl->fieldName = "rss_url";
$this->rssUrl->aliasFieldName = "podcast_podcast_rss_url";
$this->rssUrl->label = "Rss Url";
$this->rssUrl->allowNullValue = false;
$this->rssUrl->length = 255;

$this->podcast = new \Nemundo\Model\Type\Text\TextType($this);
$this->podcast->tableName = "podcast_podcast";
$this->podcast->externalTableName = "podcast_podcast";
$this->podcast->fieldName = "podcast";
$this->podcast->aliasFieldName = "podcast_podcast_podcast";
$this->podcast->label = "Podcast";
$this->podcast->allowNullValue = true;
$this->podcast->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "podcast_podcast";
$this->description->externalTableName = "podcast_podcast";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "podcast_podcast_description";
$this->description->label = "Description";
$this->description->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "rss_url";
$index->addType($this->rssUrl);

}
}