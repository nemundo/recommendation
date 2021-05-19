<?php


namespace Nemundo\Content\App\ImageGallery\Content\ImageGallery;


use Nemundo\Content\App\ImageGallery\Data\Image\Image;
use Nemundo\Model\Data\Property\File\FileProperty;

class ImageGalleryContentBuilder extends ImageGalleryContentType
{

    public function addImage(FileProperty $fileProperty)
    {

        $data = new Image();
        $data->galleryId = $this->getDataId();
        $data->image->fromFileProperty($fileProperty);
        $data->itemOrder=10;
        $data->save();

    }


}