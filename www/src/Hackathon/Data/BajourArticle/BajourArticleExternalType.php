<?php
namespace Hackathon\Data\BajourArticle;
class BajourArticleExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = BajourArticleModel::class;
$this->externalTableName = "hackathon_bajour_article";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->uniqueId = new \Nemundo\Model\Type\Text\TextType();
$this->uniqueId->fieldName = "unique_id";
$this->uniqueId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->uniqueId->externalTableName = $this->externalTableName;
$this->uniqueId->aliasFieldName = $this->uniqueId->tableName . "_" . $this->uniqueId->fieldName;
$this->uniqueId->label = "Unique Id";
$this->addType($this->uniqueId);

$this->title = new \Nemundo\Model\Type\Text\TextType();
$this->title->fieldName = "title";
$this->title->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->title->externalTableName = $this->externalTableName;
$this->title->aliasFieldName = $this->title->tableName . "_" . $this->title->fieldName;
$this->title->label = "Title";
$this->addType($this->title);

$this->lead = new \Nemundo\Model\Type\Text\LargeTextType();
$this->lead->fieldName = "lead";
$this->lead->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->lead->externalTableName = $this->externalTableName;
$this->lead->aliasFieldName = $this->lead->tableName . "_" . $this->lead->fieldName;
$this->lead->label = "Lead";
$this->addType($this->lead);

$this->url = new \Nemundo\Model\Type\Text\TextType();
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->externalTableName = $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName . "_" . $this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);

}
}