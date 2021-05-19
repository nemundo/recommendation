<?php

namespace Nemundo\Model\Data\Property\File;


use Nemundo\Core\Http\Request\File\AbstractFileRequest;
use Nemundo\Model\Data\Property\AbstractDataProperty;

abstract class AbstractFileDataProperty extends AbstractDataProperty
{

    abstract public function fromFilename($filename);

    abstract public function fromUrl($url, $filenameExtension = null);

    abstract public function fromFileRequest(AbstractFileRequest $fileRequest);


    public function fromFileProperty(FileProperty $fileProperty)
    //public function fromFileProperty(AbstractFileDataProperty $fileProperty)
    {

        if ($fileProperty->hasFilename()) {
            $this->fromFilename($fileProperty->getFilename());
        }

        if ($fileProperty->hasUrl()) {
            $this->fromUrl($fileProperty->getUrl());
        }

        if ($fileProperty->hasFileRequest()) {
            $this->fromFileRequest($fileProperty->getFileRequest());
        }

    }

}