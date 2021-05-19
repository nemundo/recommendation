<?php
namespace Nemundo\Content\App\WebCrawler\Data\Domain;
class DomainExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = DomainModel::class;
$this->externalTableName = "webcrawler_domain";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->domain = new \Nemundo\Model\Type\Text\TextType();
$this->domain->fieldName = "domain";
$this->domain->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->domain->externalTableName = $this->externalTableName;
$this->domain->aliasFieldName = $this->domain->tableName . "_" . $this->domain->fieldName;
$this->domain->label = "Domain";
$this->addType($this->domain);

$this->url = new \Nemundo\Model\Type\Text\TextType();
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->externalTableName = $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName . "_" . $this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);

}
}