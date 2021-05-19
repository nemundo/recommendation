<?php
namespace Nemundo\Content\App\Website\Data\Website;
class WebsiteModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

protected function loadModel() {
$this->tableName = "website_website";
$this->aliasTableName = "website_website";
$this->label = "Website";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "website_website";
$this->id->externalTableName = "website_website";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "website_website_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "website_website";
$this->title->externalTableName = "website_website";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "website_website_title";
$this->title->label = "Title";
$this->title->allowNullValue = true;
$this->title->length = 255;

}
}