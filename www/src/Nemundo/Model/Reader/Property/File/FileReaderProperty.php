<?php

namespace Nemundo\Model\Reader\Property\File;


use Nemundo\Core\Type\File\File;
use Nemundo\Model\Reader\Property\AbstractReaderProperty;
use Nemundo\Model\Type\File\AbstractFileType;
use Nemundo\Core\Http\Domain\DomainInformation;

class FileReaderProperty extends AbstractReaderProperty
{

    /**
     * @var AbstractFileType
     */
    protected $type;


    public function getFile()
    {
        $file = new File($this->getFullFilename());
        return $file;
    }


    public function getFilename()
    {
        $filename = $this->modelRow->getModelValue($this->type);
        return $filename;
    }


    public function getUrl()
    {
        $url = $this->type->getUrlPath() . $this->getFilename();
        return $url;
    }


    public function getUrlWithDomain()
    {
        $url = (new DomainInformation())->getDomain() . $this->getUrl();
        return $url;
    }


    public function getFullFilename()
    {
        $fullFilename = $this->type->getDataPath() . $this->getFilename();
        return $fullFilename;
    }


    public function hasValue()
    {

        $filename = $this->getFilename();
        $returnValue = true;
        if (($filename === '') || ($filename === null)) {
            $returnValue = false;
        }

        return $returnValue;

    }

}