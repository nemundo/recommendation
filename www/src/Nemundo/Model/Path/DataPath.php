<?php


namespace Nemundo\Model\Path;


use Nemundo\Core\Path\AbstractPath;
use Nemundo\Model\ModelConfig;

class DataPath extends AbstractPath
{

    protected function loadPath()
    {
        //parent::loadPath();
        $this->addPath(ModelConfig::$dataPath);
    }

}