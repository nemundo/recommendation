<?php
namespace Nemundo\Content\App\WebCrawler\Data\Url;
class UrlExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = UrlModel::class;
$this->externalTableName = "webcrawler_url";
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

$this->url = new \Nemundo\Model\Type\Text\TextType();
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->externalTableName = $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName . "_" . $this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);

$this->crawled = new \Nemundo\Model\Type\Number\YesNoType();
$this->crawled->fieldName = "crawled";
$this->crawled->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->crawled->externalTableName = $this->externalTableName;
$this->crawled->aliasFieldName = $this->crawled->tableName . "_" . $this->crawled->fieldName;
$this->crawled->label = "Crawled";
$this->addType($this->crawled);

$this->html = new \Nemundo\Model\Type\Text\LargeTextType();
$this->html->fieldName = "html";
$this->html->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->html->externalTableName = $this->externalTableName;
$this->html->aliasFieldName = $this->html->tableName . "_" . $this->html->fieldName;
$this->html->label = "Html";
$this->addType($this->html);

$this->title = new \Nemundo\Model\Type\Text\TextType();
$this->title->fieldName = "title";
$this->title->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->title->externalTableName = $this->externalTableName;
$this->title->aliasFieldName = $this->title->tableName . "_" . $this->title->fieldName;
$this->title->label = "Title";
$this->addType($this->title);

$this->external = new \Nemundo\Model\Type\Number\YesNoType();
$this->external->fieldName = "external";
$this->external->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->external->externalTableName = $this->externalTableName;
$this->external->aliasFieldName = $this->external->tableName . "_" . $this->external->fieldName;
$this->external->label = "External";
$this->addType($this->external);

$this->deep = new \Nemundo\Model\Type\Number\NumberType();
$this->deep->fieldName = "deep";
$this->deep->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->deep->externalTableName = $this->externalTableName;
$this->deep->aliasFieldName = $this->deep->tableName . "_" . $this->deep->fieldName;
$this->deep->label = "Deep";
$this->addType($this->deep);

$this->statusCode = new \Nemundo\Model\Type\Number\NumberType();
$this->statusCode->fieldName = "status_code";
$this->statusCode->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->statusCode->externalTableName = $this->externalTableName;
$this->statusCode->aliasFieldName = $this->statusCode->tableName . "_" . $this->statusCode->fieldName;
$this->statusCode->label = "Status Code";
$this->addType($this->statusCode);

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