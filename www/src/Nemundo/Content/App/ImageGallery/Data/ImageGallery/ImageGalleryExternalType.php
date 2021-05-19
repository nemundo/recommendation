<?php
namespace Nemundo\Content\App\ImageGallery\Data\ImageGallery;
class ImageGalleryExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $imageGallery;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ImageGalleryModel::class;
$this->externalTableName = "imagegallery_image_gallery";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->imageGallery = new \Nemundo\Model\Type\Text\TextType();
$this->imageGallery->fieldName = "image_gallery";
$this->imageGallery->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageGallery->externalTableName = $this->externalTableName;
$this->imageGallery->aliasFieldName = $this->imageGallery->tableName . "_" . $this->imageGallery->fieldName;
$this->imageGallery->label = "Image Gallery";
$this->addType($this->imageGallery);

}
}