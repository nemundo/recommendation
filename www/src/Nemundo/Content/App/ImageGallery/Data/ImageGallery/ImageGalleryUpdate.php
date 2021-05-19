<?php
namespace Nemundo\Content\App\ImageGallery\Data\ImageGallery;
use Nemundo\Model\Data\AbstractModelUpdate;
class ImageGalleryUpdate extends AbstractModelUpdate {
/**
* @var ImageGalleryModel
*/
public $model;

/**
* @var string
*/
public $imageGallery;

public function __construct() {
parent::__construct();
$this->model = new ImageGalleryModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->imageGallery, $this->imageGallery);
parent::update();
}
}