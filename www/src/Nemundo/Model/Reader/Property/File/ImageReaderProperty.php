<?php

namespace Nemundo\Model\Reader\Property\File;


use Nemundo\Model\Type\ImageFormat\AbstractModelImageFormat;
use Nemundo\Core\Http\Domain\DomainInformation;

class ImageReaderProperty extends FileReaderProperty
{

    public function getImageUrl(AbstractModelImageFormat $imageFormat)
    {
        $url = $this->type->getUrlPath() . $imageFormat->getPath() . '/' . $this->getFilename();
        return $url;
    }


    public function getImageUrlWithDomain(AbstractModelImageFormat $imageFormat)
    {

        $url = (new DomainInformation())->getDomain() . $this->getImageUrl($imageFormat);
        return $url;
    }


    public function getImageFullFilename(AbstractModelImageFormat $imageFormat)
    {
        $fullFilename = $this->type->getDataPath() . $imageFormat->getPath() . DIRECTORY_SEPARATOR . $this->getFilename();
        return $fullFilename;
    }


}