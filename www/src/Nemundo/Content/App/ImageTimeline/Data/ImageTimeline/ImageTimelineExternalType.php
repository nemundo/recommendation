<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
class ImageTimelineExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $timeline;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $imageUrl;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $source;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $sourceUrl;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $crawling;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ImageTimelineModel::class;
$this->externalTableName = "imagetimeline_image_timeline";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->timeline = new \Nemundo\Model\Type\Text\TextType();
$this->timeline->fieldName = "timeline";
$this->timeline->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->timeline->externalTableName = $this->externalTableName;
$this->timeline->aliasFieldName = $this->timeline->tableName . "_" . $this->timeline->fieldName;
$this->timeline->label = "Timeline";
$this->addType($this->timeline);

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType();
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageUrl->externalTableName = $this->externalTableName;
$this->imageUrl->aliasFieldName = $this->imageUrl->tableName . "_" . $this->imageUrl->fieldName;
$this->imageUrl->label = "Image Url";
$this->addType($this->imageUrl);

$this->source = new \Nemundo\Model\Type\Text\TextType();
$this->source->fieldName = "source";
$this->source->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->source->externalTableName = $this->externalTableName;
$this->source->aliasFieldName = $this->source->tableName . "_" . $this->source->fieldName;
$this->source->label = "Source";
$this->addType($this->source);

$this->sourceUrl = new \Nemundo\Model\Type\Text\TextType();
$this->sourceUrl->fieldName = "source_url";
$this->sourceUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sourceUrl->externalTableName = $this->externalTableName;
$this->sourceUrl->aliasFieldName = $this->sourceUrl->tableName . "_" . $this->sourceUrl->fieldName;
$this->sourceUrl->label = "Source Url";
$this->addType($this->sourceUrl);

$this->crawling = new \Nemundo\Model\Type\Number\YesNoType();
$this->crawling->fieldName = "crawling";
$this->crawling->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->crawling->externalTableName = $this->externalTableName;
$this->crawling->aliasFieldName = $this->crawling->tableName . "_" . $this->crawling->fieldName;
$this->crawling->label = "Crawling";
$this->addType($this->crawling);

}
}