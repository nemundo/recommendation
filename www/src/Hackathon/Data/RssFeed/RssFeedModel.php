<?php
namespace Hackathon\Data\RssFeed;
class RssFeedModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $feedTitle;

protected function loadModel() {
$this->tableName = "hackathon_rss_feed";
$this->aliasTableName = "hackathon_rss_feed";
$this->label = "Rss Feed";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hackathon_rss_feed";
$this->id->externalTableName = "hackathon_rss_feed";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hackathon_rss_feed_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->rssUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->rssUrl->tableName = "hackathon_rss_feed";
$this->rssUrl->externalTableName = "hackathon_rss_feed";
$this->rssUrl->fieldName = "rss_url";
$this->rssUrl->aliasFieldName = "hackathon_rss_feed_rss_url";
$this->rssUrl->label = "Rss Url";
$this->rssUrl->allowNullValue = false;
$this->rssUrl->length = 255;

$this->feedTitle = new \Nemundo\Model\Type\Text\TextType($this);
$this->feedTitle->tableName = "hackathon_rss_feed";
$this->feedTitle->externalTableName = "hackathon_rss_feed";
$this->feedTitle->fieldName = "feed_title";
$this->feedTitle->aliasFieldName = "hackathon_rss_feed_feed_title";
$this->feedTitle->label = "Feed Title";
$this->feedTitle->allowNullValue = false;
$this->feedTitle->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "rss_url";
$index->addType($this->rssUrl);

}
}