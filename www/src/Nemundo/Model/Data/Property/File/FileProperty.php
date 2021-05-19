<?php

namespace Nemundo\Model\Data\Property\File;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Http\Request\File\AbstractFileRequest;
use Nemundo\Core\Http\Request\File\FileRequest;
use Nemundo\Core\Http\Url\UrlInformation;
use Nemundo\Core\Type\File\File;


class FileProperty extends AbstractBase
{

    private $filename;

    private $url;

    /**
     * @var FileRequest
     */
    private $fileRequest;


    public function hasFilename()
    {

        $value = false;
        if ($this->filename !== null) {
            $value = true;
        }
        return $value;

    }

    public function getFilename()
    {

        return $this->filename;

    }

    public function fromFilename($filename)
    {

        $this->filename = $filename;
        return $this;
    }


    public function fromUrl($url, $filenameExtension = null)
    {

        $this->url = $url;
        return $this;
    }


    public function hasUrl()
    {

        $value = false;
        if ($this->url !== null) {
            $value = true;
        }
        return $value;

    }

    public function getUrl()
    {
        return $this->url;
    }


    public function fromFileRequest(AbstractFileRequest $fileRequest)
    {
        $this->fileRequest = $fileRequest;
        return $this;
    }


    public function hasFileRequest()
    {

        $value = false;
        if ($this->fileRequest !== null) {
            if ($this->fileRequest->hasValue()) {
                $value = true;
            }

        }
        return $value;

    }


    public function getFileRequest()
    {
        return $this->fileRequest;
    }


    public function getOrginalFilename()
    {

        $filename = null;

        if ($this->hasFilename()) {
            $filename = (new File( $this->getFilename()))->filename;
        }

        if ($this->hasUrl()) {
            $filename = (new UrlInformation( $this->getUrl()))->getFilename();
        }

        if ($this->hasFileRequest()) {
            $filename = $this->getFileRequest()->filename;
        }

        return $filename;

    }

}