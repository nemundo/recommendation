<?php
namespace Nemundo\Content\App\ImageGallery\Data\ImageGallery;
class ImageGalleryValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ImageGalleryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageGalleryModel();
}
}