<?php
namespace Nemundo\Content\App\ImageGallery\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ImageGalleryModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\ImageGallery\Data\Image\ImageModel());
$this->addModel(new \Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryModel());
}
}