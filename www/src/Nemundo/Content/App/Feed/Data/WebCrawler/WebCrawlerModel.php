<?php
namespace Nemundo\Content\App\Feed\Data\WebCrawler;
class WebCrawlerModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phpClass;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

protected function loadModel() {
$this->tableName = "feed_webcrawler";
$this->aliasTableName = "feed_webcrawler";
$this->label = "WebCrawler";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "feed_webcrawler";
$this->id->externalTableName = "feed_webcrawler";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "feed_webcrawler_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->phpClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->phpClass->tableName = "feed_webcrawler";
$this->phpClass->externalTableName = "feed_webcrawler";
$this->phpClass->fieldName = "php_class";
$this->phpClass->aliasFieldName = "feed_webcrawler_php_class";
$this->phpClass->label = "Php Class";
$this->phpClass->allowNullValue = true;
$this->phpClass->length = 255;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "feed_webcrawler";
$this->setupStatus->externalTableName = "feed_webcrawler";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "feed_webcrawler_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "php_class";
$index->addType($this->phpClass);

}
}