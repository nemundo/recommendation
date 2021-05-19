<?php

namespace Nemundo\Project\Path;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\AbstractPath;
use Nemundo\Project\Config\ProjectConfigReader;

class CachePath extends AbstractPath
{

    /**
     * @var string
     */
    private static $cachePath;


    protected function loadPath()
    {

        if (CachePath::$cachePath == null) {
            CachePath::$cachePath = (new ProjectConfigReader())->getValue('cache_path');

            if (CachePath::$cachePath == '') {
                (new LogMessage())->writeError('Cache Path not defined');
            }

        }

        $this->addPath(CachePath::$cachePath);

    }

}