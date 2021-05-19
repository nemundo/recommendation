<?php

namespace Nemundo\Model\Data\Property\File;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Request\File\AbstractFileRequest;
use Nemundo\Core\Http\Request\File\FileRequest;
use Nemundo\Core\Type\File\File;
use Nemundo\Model\Type\File\RedirectFilenameType;


class RedirectFilenameDataProperty extends AbstractFileDataProperty
{

    /**
     * @var RedirectFilenameType
     */
    protected $type;

    public function fromFilename($filename, $filenameOrginal = null)
    {

        $file = new File($filename);

        $fileProperty = new FileDataProperty($this->type->file, $this->typeValueList);
        $fileProperty->fromFilename($filename);

        if ($filenameOrginal == null) {
            $filenameOrginal = $file->filename;
        }


        if ($file->fileExists()) {

            $this->typeValueList->setModelValue($this->type->fileName, $filenameOrginal);
            $this->typeValueList->setModelValue($this->type->fileExtension, $file->getFileExtension());
            $this->typeValueList->setModelValue($this->type->fileSize, $file->getFileSize());

        }

    }


    public function fromUrl($url, $filenameExtension = null)
    {

        if ($filenameExtension == null) {
            $filenameExtension = (new File($url))->getFileExtension();
        }

        $filename = (new File($url))->filename;

        $fileProperty = new FileDataProperty($this->type->file, $this->typeValueList);
        $fileProperty->fromUrl($url);

        // not working !!!
        $this->typeValueList->setModelValue($this->type->fileName, $filename);
        $this->typeValueList->setModelValue($this->type->fileExtension, $filenameExtension);

    }


    public function fromFileRequest(AbstractFileRequest $fileRequest)
    {

        $fileProperty = new FileDataProperty($this->type->file, $this->typeValueList);
        $fileProperty->fromFileRequest($fileRequest);

        $this->typeValueList->setModelValue($this->type->fileName, $fileRequest->filename);
        $this->typeValueList->setModelValue($this->type->fileExtension, $fileRequest->filenameExtension);
        $this->typeValueList->setModelValue($this->type->fileSize, $fileRequest->fileSize);

    }

}