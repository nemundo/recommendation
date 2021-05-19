<?php
namespace Nemundo\Content\App\ImageGallery\Data\ImageGallery;
class ImageGalleryModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $imageGallery;

protected function loadModel() {
$this->tableName = "imagegallery_image_gallery";
$this->aliasTableName = "imagegallery_image_gallery";
$this->label = "Image Gallery";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "imagegallery_image_gallery";
$this->id->externalTableName = "imagegallery_image_gallery";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "imagegallery_image_gallery_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->imageGallery = new \Nemundo\Model\Type\Text\TextType($this);
$this->imageGallery->tableName = "imagegallery_image_gallery";
$this->imageGallery->externalTableName = "imagegallery_image_gallery";
$this->imageGallery->fieldName = "image_gallery";
$this->imageGallery->aliasFieldName = "imagegallery_image_gallery_image_gallery";
$this->imageGallery->label = "Image Gallery";
$this->imageGallery->allowNullValue = true;
$this->imageGallery->length = 255;

}
}