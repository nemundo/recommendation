<?php
namespace Nemundo\Content\App\Website\Data\Webpage;
class WebpageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "website_webpage";
$this->aliasTableName = "website_webpage";
$this->label = "Webpage";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "website_webpage";
$this->id->externalTableName = "website_webpage";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "website_webpage_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "website_webpage";
$this->title->externalTableName = "website_webpage";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "website_webpage_title";
$this->title->label = "Title";
$this->title->allowNullValue = true;
$this->title->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "website_webpage";
$this->description->externalTableName = "website_webpage";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "website_webpage_description";
$this->description->label = "Description";
$this->description->allowNullValue = true;

}
}