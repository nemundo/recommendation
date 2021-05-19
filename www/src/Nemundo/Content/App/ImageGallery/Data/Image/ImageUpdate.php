<?php
namespace Nemundo\Content\App\ImageGallery\Data\Image;
use Nemundo\Model\Data\AbstractModelUpdate;
class ImageUpdate extends AbstractModelUpdate {
/**
* @var ImageModel
*/
public $model;

/**
* @var string
*/
public $galleryId;

/**
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $image;

/**
* @var int
*/
public $itemOrder;

public function __construct() {
parent::__construct();
$this->model = new ImageModel();
$this->image = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->image, $this->typeValueList);
}
public function update() {
$this->typeValueList->setModelValue($this->model->galleryId, $this->galleryId);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
parent::update();
}
}