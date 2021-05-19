<?php


namespace Nemundo\Core\Log;


use Nemundo\Core\Path\AbstractPath;

class LogPath extends AbstractPath
{

    protected function loadPath()
    {
        $this->addPath(LogConfig::$logPath);
        //$this->addPath('performance.log');
        // TODO: Implement loadPath() method.
    }

}