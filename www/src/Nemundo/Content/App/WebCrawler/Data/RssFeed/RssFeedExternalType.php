<?php
namespace Nemundo\Content\App\WebCrawler\Data\RssFeed;
class RssFeedExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = RssFeedModel::class;
$this->externalTableName = "webcrawler_rss_feed";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->domainId = new \Nemundo\Model\Type\Id\IdType();
$this->domainId->fieldName = "domain";
$this->domainId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->domainId->aliasFieldName = $this->domainId->tableName ."_".$this->domainId->fieldName;
$this->domainId->label = "Domain";
$this->addType($this->domainId);

$this->rssUrl = new \Nemundo\Model\Type\Text\TextType();
$this->rssUrl->fieldName = "rss_url";
$this->rssUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->rssUrl->externalTableName = $this->externalTableName;
$this->rssUrl->aliasFieldName = $this->rssUrl->tableName . "_" . $this->rssUrl->fieldName;
$this->rssUrl->label = "Rss Url";
$this->addType($this->rssUrl);

}
public function loadDomain() {
if ($this->domain == null) {
$this->domain = new \Nemundo\Content\App\WebCrawler\Data\Domain\DomainExternalType(null, $this->parentFieldName . "_domain");
$this->domain->fieldName = "domain";
$this->domain->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->domain->aliasFieldName = $this->domain->tableName ."_".$this->domain->fieldName;
$this->domain->label = "Domain";
$this->addType($this->domain);
}
return $this;
}
}