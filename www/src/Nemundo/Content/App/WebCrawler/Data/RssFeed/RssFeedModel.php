<?php
namespace Nemundo\Content\App\WebCrawler\Data\RssFeed;
class RssFeedModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $domainId;

/**
* @var \Nemundo\Content\App\WebCrawler\Data\Domain\DomainExternalType
*/
public $domain;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $rssUrl;

protected function loadModel() {
$this->tableName = "webcrawler_rss_feed";
$this->aliasTableName = "webcrawler_rss_feed";
$this->label = "Rss Feed";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcrawler_rss_feed";
$this->id->externalTableName = "webcrawler_rss_feed";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcrawler_rss_feed_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->domainId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->domainId->tableName = "webcrawler_rss_feed";
$this->domainId->fieldName = "domain";
$this->domainId->aliasFieldName = "webcrawler_rss_feed_domain";
$this->domainId->label = "Domain";
$this->domainId->allowNullValue = false;

$this->rssUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->rssUrl->tableName = "webcrawler_rss_feed";
$this->rssUrl->externalTableName = "webcrawler_rss_feed";
$this->rssUrl->fieldName = "rss_url";
$this->rssUrl->aliasFieldName = "webcrawler_rss_feed_rss_url";
$this->rssUrl->label = "Rss Url";
$this->rssUrl->allowNullValue = false;
$this->rssUrl->length = 255;

}
public function loadDomain() {
if ($this->domain == null) {
$this->domain = new \Nemundo\Content\App\WebCrawler\Data\Domain\DomainExternalType($this, "webcrawler_rss_feed_domain");
$this->domain->tableName = "webcrawler_rss_feed";
$this->domain->fieldName = "domain";
$this->domain->aliasFieldName = "webcrawler_rss_feed_domain";
$this->domain->label = "Domain";
}
return $this;
}
}