<?php
namespace Nemundo\Content\App\ImageGallery\Data\ImageGallery;
use Nemundo\Model\Id\AbstractModelIdValue;
class ImageGalleryId extends AbstractModelIdValue {
/**
* @var ImageGalleryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageGalleryModel();
}
}