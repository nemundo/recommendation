<?php

namespace Nemundo\Project\Path;

use Nemundo\Core\Path\AbstractPath;
use Nemundo\Web\WebConfig;

class WebPath extends AbstractPath
{

    protected function loadPath()
    {

        $this->addPath(WebConfig::$webPath);

    }

}