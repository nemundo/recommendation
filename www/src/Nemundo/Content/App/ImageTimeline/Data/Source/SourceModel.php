<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Source;
class SourceModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "imagetimeline_source";
$this->aliasTableName = "imagetimeline_source";
$this->label = "Source";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "imagetimeline_source";
$this->id->externalTableName = "imagetimeline_source";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "imagetimeline_source_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->source = new \Nemundo\Model\Type\Text\TextType($this);
$this->source->tableName = "imagetimeline_source";
$this->source->externalTableName = "imagetimeline_source";
$this->source->fieldName = "source";
$this->source->aliasFieldName = "imagetimeline_source_source";
$this->source->label = "Source";
$this->source->allowNullValue = false;
$this->source->length = 255;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "imagetimeline_source";
$this->url->externalTableName = "imagetimeline_source";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "imagetimeline_source_url";
$this->url->label = "Url";
$this->url->allowNullValue = false;
$this->url->length = 255;

}
}