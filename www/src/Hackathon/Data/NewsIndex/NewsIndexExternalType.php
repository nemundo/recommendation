<?php
namespace Hackathon\Data\NewsIndex;
class NewsIndexExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $sourceId;

/**
* @var \Hackathon\Data\SourceIndex\SourceIndexExternalType
*/
public $source;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $newsTypeId;

/**
* @var \Hackathon\Data\NewsType\NewsTypeExternalType
*/
public $newsType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = NewsIndexModel::class;
$this->externalTableName = "hackathon_news_index";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->title = new \Nemundo\Model\Type\Text\TextType();
$this->title->fieldName = "title";
$this->title->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->title->externalTableName = $this->externalTableName;
$this->title->aliasFieldName = $this->title->tableName . "_" . $this->title->fieldName;
$this->title->label = "Title";
$this->addType($this->title);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->externalTableName = $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Description";
$this->addType($this->description);

$this->url = new \Nemundo\Model\Type\Text\TextType();
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->externalTableName = $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName . "_" . $this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);

$this->sourceId = new \Nemundo\Model\Type\Id\IdType();
$this->sourceId->fieldName = "source";
$this->sourceId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sourceId->aliasFieldName = $this->sourceId->tableName ."_".$this->sourceId->fieldName;
$this->sourceId->label = "Source";
$this->addType($this->sourceId);

$this->newsTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->newsTypeId->fieldName = "news_type";
$this->newsTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->newsTypeId->aliasFieldName = $this->newsTypeId->tableName ."_".$this->newsTypeId->fieldName;
$this->newsTypeId->label = "News Type";
$this->addType($this->newsTypeId);

}
public function loadSource() {
if ($this->source == null) {
$this->source = new \Hackathon\Data\SourceIndex\SourceIndexExternalType(null, $this->parentFieldName . "_source");
$this->source->fieldName = "source";
$this->source->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->source->aliasFieldName = $this->source->tableName ."_".$this->source->fieldName;
$this->source->label = "Source";
$this->addType($this->source);
}
return $this;
}
public function loadNewsType() {
if ($this->newsType == null) {
$this->newsType = new \Hackathon\Data\NewsType\NewsTypeExternalType(null, $this->parentFieldName . "_news_type");
$this->newsType->fieldName = "news_type";
$this->newsType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->newsType->aliasFieldName = $this->newsType->tableName ."_".$this->newsType->fieldName;
$this->newsType->label = "News Type";
$this->addType($this->newsType);
}
return $this;
}
}