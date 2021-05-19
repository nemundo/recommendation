<?php
namespace Nemundo\Content\App\ImageGallery\Data\Image;
class ImageExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $galleryId;

/**
* @var \Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryExternalType
*/
public $gallery;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $image;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $itemOrder;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ImageModel::class;
$this->externalTableName = "imagegallery_image";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->galleryId = new \Nemundo\Model\Type\Id\IdType();
$this->galleryId->fieldName = "gallery";
$this->galleryId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->galleryId->aliasFieldName = $this->galleryId->tableName ."_".$this->galleryId->fieldName;
$this->galleryId->label = "Gallery";
$this->addType($this->galleryId);

$this->image = new \Nemundo\Model\Type\File\ImageType();
$this->image->fieldName = "image";
$this->image->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->image->externalTableName = $this->externalTableName;
$this->image->aliasFieldName = $this->image->tableName . "_" . $this->image->fieldName;
$this->image->label = "Image";
$this->addType($this->image);

$this->itemOrder = new \Nemundo\Model\Type\Number\NumberType();
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->itemOrder->externalTableName = $this->externalTableName;
$this->itemOrder->aliasFieldName = $this->itemOrder->tableName . "_" . $this->itemOrder->fieldName;
$this->itemOrder->label = "Item Order";
$this->addType($this->itemOrder);

}
public function loadGallery() {
if ($this->gallery == null) {
$this->gallery = new \Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryExternalType(null, $this->parentFieldName . "_gallery");
$this->gallery->fieldName = "gallery";
$this->gallery->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->gallery->aliasFieldName = $this->gallery->tableName ."_".$this->gallery->fieldName;
$this->gallery->label = "Gallery";
$this->addType($this->gallery);
}
return $this;
}
}