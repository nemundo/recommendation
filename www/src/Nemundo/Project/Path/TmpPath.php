<?php

namespace Nemundo\Project\Path;

class TmpPath extends ProjectPath
{

    protected function loadPath()
    {
        parent::loadPath();
        $this->addPath('tmp');

    }

}