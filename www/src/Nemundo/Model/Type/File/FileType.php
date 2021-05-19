<?php

namespace Nemundo\Model\Type\File;


use Nemundo\Core\Http\Domain\DomainInformation;
use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Model\ModelConfig;


class FileType extends AbstractFileType
{

    /**
     * @var AcceptFileType
     */
    public $acceptFileType;

    public function getDataPath()
    {


        //$path = ModelConfig::$dataPath . $this->tableName . DIRECTORY_SEPARATOR . $this->fieldName . DIRECTORY_SEPARATOR;

        $path = ModelConfig::$dataPath . $this->externalTableName . DIRECTORY_SEPARATOR . $this->fieldName . DIRECTORY_SEPARATOR;


        return $path;
    }


    public function getUrlPath()
    {

        //$url = ModelConfig::$dataUrl . $this->tableName . '/' . $this->fieldName . '/';
        $url = ModelConfig::$dataUrl . $this->externalTableName . '/' . $this->fieldName . '/';
        return $url;
    }


    public function getFullUrlPath()
    {
        $url = (new DomainInformation())->getDomain() . $this->getUrlPath();
        return $url;
    }

}
