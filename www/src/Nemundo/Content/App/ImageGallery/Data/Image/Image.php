<?php
namespace Nemundo\Content\App\ImageGallery\Data\Image;
class Image extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ImageModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->galleryId, $this->galleryId);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
$id = parent::save();
return $id;
}
}