<?php
namespace Nemundo\Content\App\ImageTimeline\Data\ImageTimeline;
class ImageTimelineModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "imagetimeline_image_timeline";
$this->aliasTableName = "imagetimeline_image_timeline";
$this->label = "Image Timeline";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "imagetimeline_image_timeline";
$this->id->externalTableName = "imagetimeline_image_timeline";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "imagetimeline_image_timeline_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->timeline = new \Nemundo\Model\Type\Text\TextType($this);
$this->timeline->tableName = "imagetimeline_image_timeline";
$this->timeline->externalTableName = "imagetimeline_image_timeline";
$this->timeline->fieldName = "timeline";
$this->timeline->aliasFieldName = "imagetimeline_image_timeline_timeline";
$this->timeline->label = "Timeline";
$this->timeline->allowNullValue = false;
$this->timeline->length = 255;

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->imageUrl->tableName = "imagetimeline_image_timeline";
$this->imageUrl->externalTableName = "imagetimeline_image_timeline";
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->aliasFieldName = "imagetimeline_image_timeline_image_url";
$this->imageUrl->label = "Image Url";
$this->imageUrl->allowNullValue = false;
$this->imageUrl->length = 255;

$this->source = new \Nemundo\Model\Type\Text\TextType($this);
$this->source->tableName = "imagetimeline_image_timeline";
$this->source->externalTableName = "imagetimeline_image_timeline";
$this->source->fieldName = "source";
$this->source->aliasFieldName = "imagetimeline_image_timeline_source";
$this->source->label = "Source";
$this->source->allowNullValue = true;
$this->source->length = 255;

$this->sourceUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->sourceUrl->tableName = "imagetimeline_image_timeline";
$this->sourceUrl->externalTableName = "imagetimeline_image_timeline";
$this->sourceUrl->fieldName = "source_url";
$this->sourceUrl->aliasFieldName = "imagetimeline_image_timeline_source_url";
$this->sourceUrl->label = "Source Url";
$this->sourceUrl->allowNullValue = true;
$this->sourceUrl->length = 255;

$this->crawling = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->crawling->tableName = "imagetimeline_image_timeline";
$this->crawling->externalTableName = "imagetimeline_image_timeline";
$this->crawling->fieldName = "crawling";
$this->crawling->aliasFieldName = "imagetimeline_image_timeline_crawling";
$this->crawling->label = "Crawling";
$this->crawling->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "imge_url";
$index->addType($this->imageUrl);

}
}