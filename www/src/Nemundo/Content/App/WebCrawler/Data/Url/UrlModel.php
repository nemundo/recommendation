<?php
namespace Nemundo\Content\App\WebCrawler\Data\Url;
class UrlModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $url;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $crawled;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $html;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $external;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $deep;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $statusCode;

protected function loadModel() {
$this->tableName = "webcrawler_url";
$this->aliasTableName = "webcrawler_url";
$this->label = "Url";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcrawler_url";
$this->id->externalTableName = "webcrawler_url";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcrawler_url_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->domainId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->domainId->tableName = "webcrawler_url";
$this->domainId->fieldName = "domain";
$this->domainId->aliasFieldName = "webcrawler_url_domain";
$this->domainId->label = "Domain";
$this->domainId->allowNullValue = false;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "webcrawler_url";
$this->url->externalTableName = "webcrawler_url";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "webcrawler_url_url";
$this->url->label = "Url";
$this->url->allowNullValue = false;
$this->url->length = 255;

$this->crawled = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->crawled->tableName = "webcrawler_url";
$this->crawled->externalTableName = "webcrawler_url";
$this->crawled->fieldName = "crawled";
$this->crawled->aliasFieldName = "webcrawler_url_crawled";
$this->crawled->label = "Crawled";
$this->crawled->allowNullValue = false;

$this->html = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->html->tableName = "webcrawler_url";
$this->html->externalTableName = "webcrawler_url";
$this->html->fieldName = "html";
$this->html->aliasFieldName = "webcrawler_url_html";
$this->html->label = "Html";
$this->html->allowNullValue = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "webcrawler_url";
$this->title->externalTableName = "webcrawler_url";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "webcrawler_url_title";
$this->title->label = "Title";
$this->title->allowNullValue = false;
$this->title->length = 255;

$this->external = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->external->tableName = "webcrawler_url";
$this->external->externalTableName = "webcrawler_url";
$this->external->fieldName = "external";
$this->external->aliasFieldName = "webcrawler_url_external";
$this->external->label = "External";
$this->external->allowNullValue = false;

$this->deep = new \Nemundo\Model\Type\Number\NumberType($this);
$this->deep->tableName = "webcrawler_url";
$this->deep->externalTableName = "webcrawler_url";
$this->deep->fieldName = "deep";
$this->deep->aliasFieldName = "webcrawler_url_deep";
$this->deep->label = "Deep";
$this->deep->allowNullValue = true;

$this->statusCode = new \Nemundo\Model\Type\Number\NumberType($this);
$this->statusCode->tableName = "webcrawler_url";
$this->statusCode->externalTableName = "webcrawler_url";
$this->statusCode->fieldName = "status_code";
$this->statusCode->aliasFieldName = "webcrawler_url_status_code";
$this->statusCode->label = "Status Code";
$this->statusCode->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "domain_url";
$index->addType($this->domainId);
$index->addType($this->url);

}
public function loadDomain() {
if ($this->domain == null) {
$this->domain = new \Nemundo\Content\App\WebCrawler\Data\Domain\DomainExternalType($this, "webcrawler_url_domain");
$this->domain->tableName = "webcrawler_url";
$this->domain->fieldName = "domain";
$this->domain->aliasFieldName = "webcrawler_url_domain";
$this->domain->label = "Domain";
}
return $this;
}
}