<?php

namespace Nemundo\Model\Data\Property\File;


use Nemundo\Core\Http\Request\File\AbstractFileRequest;
use Nemundo\Model\Type\File\MultiFileType;


abstract class AbstractMultiFileDataProperty extends AbstractFileDataProperty
{

    /**
     * @var string
     */
    public $defaultFileExtension;

    /**
     * @var MultiFileType
     */
    protected $type;


    protected $filenameList = [];

    protected $urlList = [];

    protected $fileRequestList = [];


    abstract public function saveData($id);


    public function fromFilename($filename)
    {

        $this->filenameList[] = $filename;
        return $this;

    }


    public function fromUrl($url, $filenameExtension = null)
    {

        $this->urlList[] = $url;
        return $this;

    }


    public function fromFileRequest(AbstractFileRequest $fileRequest)
    {

        $this->fileRequestList[] = $fileRequest;
        return $this;

    }

}