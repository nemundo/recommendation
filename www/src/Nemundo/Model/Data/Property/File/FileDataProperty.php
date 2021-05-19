<?php

namespace Nemundo\Model\Data\Property\File;


use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Http\Request\File\AbstractFileRequest;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\WebRequest\WebRequest;
use Nemundo\Model\Type\File\AbstractFileType;


class FileDataProperty extends AbstractFileDataProperty
{

    /**
     * @var AbstractFileType
     */
    protected $type;


    public function fromFilename($filename)
    {

        $uniqueFilename = null;
        $fullFilename = null;

        if ($filename !== null) {

            $file = new File($filename);

            if ($file->fileExists()) {

                $uniqueFilename = (new UniqueFilename())->getUniqueFilename($file->getFileExtension());

                if ($this->type->keepOrginalFilename) {
                    $uniqueFilename = $file->filename;
                }

                $fullFilename = $this->type->getDataPath() . $uniqueFilename;
                $file->saveAs($fullFilename);
                $this->typeValueList->setModelValue($this->type, $uniqueFilename);
            } else {
                (new LogMessage())->writeError('File existiert nicht. ' . $filename);
            }

        }

        return $fullFilename;

    }


    public function fromUrl($url, $filenameExtension = null)
    {

        if ($filenameExtension == null) {
            $filenameExtension = (new WebRequest())->getMimeType($url);
        }

        $uniqueFilename = (new UniqueFilename())->getUniqueFilename($filenameExtension);
        $fullFilename = $this->type->getDataPath() . $uniqueFilename;

        (new WebRequest())->downloadUrl($url, $fullFilename);
        $this->typeValueList->setModelValue($this->type, $uniqueFilename);

        return $fullFilename;

    }


    public function fromFileRequest(AbstractFileRequest $fileRequest)
    {

        $filename = '';
        $fullFilename = '';
        if ($fileRequest->isDownloadSuccesful()) {

            $path = $this->type->getDataPath();
            $fullFilename = $fileRequest->saveAsUniqueFilename($path);
            $filename = basename($fullFilename);

        }

        $this->typeValueList->setModelValue($this->type, $filename);

        return $fullFilename;

    }

}