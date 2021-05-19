<?php
namespace Nemundo\Content\App\WebCrawler\Data\Domain;
class DomainModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $domain;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

protected function loadModel() {
$this->tableName = "webcrawler_domain";
$this->aliasTableName = "webcrawler_domain";
$this->label = "Domain";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcrawler_domain";
$this->id->externalTableName = "webcrawler_domain";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcrawler_domain_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->domain = new \Nemundo\Model\Type\Text\TextType($this);
$this->domain->tableName = "webcrawler_domain";
$this->domain->externalTableName = "webcrawler_domain";
$this->domain->fieldName = "domain";
$this->domain->aliasFieldName = "webcrawler_domain_domain";
$this->domain->label = "Domain";
$this->domain->allowNullValue = false;
$this->domain->length = 255;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "webcrawler_domain";
$this->url->externalTableName = "webcrawler_domain";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "webcrawler_domain_url";
$this->url->label = "Url";
$this->url->allowNullValue = false;
$this->url->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "domain";
$index->addType($this->domain);

}
}