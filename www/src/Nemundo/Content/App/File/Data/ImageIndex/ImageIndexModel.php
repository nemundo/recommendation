<?php
namespace Nemundo\Content\App\File\Data\ImageIndex;
class ImageIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $image;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize200;

protected function loadModel() {
$this->tableName = "file_image_index";
$this->aliasTableName = "file_image_index";
$this->label = "Image Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "file_image_index";
$this->id->externalTableName = "file_image_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "file_image_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "file_image_index";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "file_image_index_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = true;

$this->image = new \Nemundo\Model\Type\File\ImageType($this);
$this->image->tableName = "file_image_index";
$this->image->externalTableName = "file_image_index";
$this->image->fieldName = "image";
$this->image->aliasFieldName = "file_image_index_image";
$this->image->label = "Image";
$this->image->allowNullValue = true;
$this->imageAutoSize200 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize200->size = 200;

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "file_image_index_content");
$this->content->tableName = "file_image_index";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "file_image_index_content";
$this->content->label = "Content";
}
return $this;
}
}