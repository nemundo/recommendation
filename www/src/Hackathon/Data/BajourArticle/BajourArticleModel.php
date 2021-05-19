<?php
namespace Hackathon\Data\BajourArticle;
class BajourArticleModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $uniqueId;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $lead;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

protected function loadModel() {
$this->tableName = "hackathon_bajour_article";
$this->aliasTableName = "hackathon_bajour_article";
$this->label = "Bajour Article";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hackathon_bajour_article";
$this->id->externalTableName = "hackathon_bajour_article";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hackathon_bajour_article_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->uniqueId = new \Nemundo\Model\Type\Text\TextType($this);
$this->uniqueId->tableName = "hackathon_bajour_article";
$this->uniqueId->externalTableName = "hackathon_bajour_article";
$this->uniqueId->fieldName = "unique_id";
$this->uniqueId->aliasFieldName = "hackathon_bajour_article_unique_id";
$this->uniqueId->label = "Unique Id";
$this->uniqueId->allowNullValue = false;
$this->uniqueId->length = 50;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "hackathon_bajour_article";
$this->title->externalTableName = "hackathon_bajour_article";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "hackathon_bajour_article_title";
$this->title->label = "Title";
$this->title->allowNullValue = false;
$this->title->length = 255;

$this->lead = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->lead->tableName = "hackathon_bajour_article";
$this->lead->externalTableName = "hackathon_bajour_article";
$this->lead->fieldName = "lead";
$this->lead->aliasFieldName = "hackathon_bajour_article_lead";
$this->lead->label = "Lead";
$this->lead->allowNullValue = false;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "hackathon_bajour_article";
$this->url->externalTableName = "hackathon_bajour_article";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "hackathon_bajour_article_url";
$this->url->label = "Url";
$this->url->allowNullValue = false;
$this->url->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "unique_id";
$index->addType($this->uniqueId);

}
}