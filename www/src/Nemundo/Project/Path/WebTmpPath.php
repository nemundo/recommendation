<?php

namespace Nemundo\Project\Path;

use Nemundo\Web\WebConfig;

// TmpWebPath
class WebTmpPath extends WebPath
{

    protected function loadPath()
    {
        parent::loadPath();
        $this->addPath('tmp');

    }

}