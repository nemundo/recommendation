<?php

namespace Nemundo\Project\Path;


class LogPath extends ProjectPath
{

    protected function loadPath()
    {
        parent::loadPath();
        $this->addPath('log');
    }

}