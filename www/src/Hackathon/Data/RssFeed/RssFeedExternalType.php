<?php
namespace Hackathon\Data\RssFeed;
class RssFeedExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = RssFeedModel::class;
$this->externalTableName = "hackathon_rss_feed";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->rssUrl = new \Nemundo\Model\Type\Text\TextType();
$this->rssUrl->fieldName = "rss_url";
$this->rssUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->rssUrl->externalTableName = $this->externalTableName;
$this->rssUrl->aliasFieldName = $this->rssUrl->tableName . "_" . $this->rssUrl->fieldName;
$this->rssUrl->label = "Rss Url";
$this->addType($this->rssUrl);

$this->feedTitle = new \Nemundo\Model\Type\Text\TextType();
$this->feedTitle->fieldName = "feed_title";
$this->feedTitle->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->feedTitle->externalTableName = $this->externalTableName;
$this->feedTitle->aliasFieldName = $this->feedTitle->tableName . "_" . $this->feedTitle->fieldName;
$this->feedTitle->label = "Feed Title";
$this->addType($this->feedTitle);

}
}