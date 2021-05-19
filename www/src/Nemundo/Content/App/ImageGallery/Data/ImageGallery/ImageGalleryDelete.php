<?php
namespace Nemundo\Content\App\ImageGallery\Data\ImageGallery;
class ImageGalleryDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ImageGalleryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageGalleryModel();
}
}