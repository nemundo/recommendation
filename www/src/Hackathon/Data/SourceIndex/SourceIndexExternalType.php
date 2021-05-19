<?php
namespace Hackathon\Data\SourceIndex;
class SourceIndexExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $source;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $uniqueUrl;

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
$this->externalModelClassName = SourceIndexModel::class;
$this->externalTableName = "hackathon_source_index";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->source = new \Nemundo\Model\Type\Text\TextType();
$this->source->fieldName = "source";
$this->source->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->source->externalTableName = $this->externalTableName;
$this->source->aliasFieldName = $this->source->tableName . "_" . $this->source->fieldName;
$this->source->label = "Source";
$this->addType($this->source);

$this->uniqueUrl = new \Nemundo\Model\Type\Text\TextType();
$this->uniqueUrl->fieldName = "unique_url";
$this->uniqueUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->uniqueUrl->externalTableName = $this->externalTableName;
$this->uniqueUrl->aliasFieldName = $this->uniqueUrl->tableName . "_" . $this->uniqueUrl->fieldName;
$this->uniqueUrl->label = "Unique Url";
$this->addType($this->uniqueUrl);

$this->newsTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->newsTypeId->fieldName = "news_type";
$this->newsTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->newsTypeId->aliasFieldName = $this->newsTypeId->tableName ."_".$this->newsTypeId->fieldName;
$this->newsTypeId->label = "News Type";
$this->addType($this->newsTypeId);

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