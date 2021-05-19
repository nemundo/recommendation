<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Source;
class SourceExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
public $url;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = SourceModel::class;
$this->externalTableName = "imagetimeline_source";
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

$this->url = new \Nemundo\Model\Type\Text\TextType();
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->externalTableName = $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName . "_" . $this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);

}
}