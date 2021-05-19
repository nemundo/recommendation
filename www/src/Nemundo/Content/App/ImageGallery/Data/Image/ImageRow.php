<?php
namespace Nemundo\Content\App\ImageGallery\Data\Image;
class ImageRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ImageModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $galleryId;

/**
* @var \Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryRow
*/
public $gallery;

/**
* @var \Nemundo\Model\Reader\Property\File\ImageReaderProperty
*/
public $image;

/**
* @var int
*/
public $itemOrder;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->galleryId = $this->getModelValue($model->galleryId);
if ($model->gallery !== null) {
$this->loadNemundoContentAppImageGalleryDataImageGalleryImageGallerygalleryRow($model->gallery);
}
$this->image = new \Nemundo\Model\Reader\Property\File\ImageReaderProperty($row, $model->image);
$this->itemOrder = intval($this->getModelValue($model->itemOrder));
}
private function loadNemundoContentAppImageGalleryDataImageGalleryImageGallerygalleryRow($model) {
$this->gallery = new \Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryRow($this->row, $model);
}
}