<?php

namespace Nemundo\Model\Type\File;


use Nemundo\Model\ModelConfig;
use Nemundo\Web\Site\AbstractSite;

class RedirectFileType extends FileType
{

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    public function getDataPath()
    {
        $path = ModelConfig::$redirectDataPath . $this->tableName . DIRECTORY_SEPARATOR . $this->fieldName . DIRECTORY_SEPARATOR;
        return $path;
    }

}