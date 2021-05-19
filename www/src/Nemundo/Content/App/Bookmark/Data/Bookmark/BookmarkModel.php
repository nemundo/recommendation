<?php
namespace Nemundo\Content\App\Bookmark\Data\Bookmark;
class BookmarkModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $image;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize800;

protected function loadModel() {
$this->tableName = "bookmark_bookmark";
$this->aliasTableName = "bookmark_bookmark";
$this->label = "Bookmark";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "bookmark_bookmark";
$this->id->externalTableName = "bookmark_bookmark";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "bookmark_bookmark_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "bookmark_bookmark";
$this->url->externalTableName = "bookmark_bookmark";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "bookmark_bookmark_url";
$this->url->label = "Url";
$this->url->allowNullValue = false;
$this->url->length = 255;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "bookmark_bookmark";
$this->title->externalTableName = "bookmark_bookmark";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "bookmark_bookmark_title";
$this->title->label = "Title";
$this->title->allowNullValue = false;
$this->title->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "bookmark_bookmark";
$this->description->externalTableName = "bookmark_bookmark";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "bookmark_bookmark_description";
$this->description->label = "Description";
$this->description->allowNullValue = true;

$this->image = new \Nemundo\Model\Type\File\ImageType($this);
$this->image->tableName = "bookmark_bookmark";
$this->image->externalTableName = "bookmark_bookmark";
$this->image->fieldName = "image";
$this->image->aliasFieldName = "bookmark_bookmark_image";
$this->image->label = "Image";
$this->image->allowNullValue = true;
$this->imageAutoSize800 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize800->size = 800;

}
}