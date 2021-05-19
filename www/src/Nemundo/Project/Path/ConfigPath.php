<?php

namespace Nemundo\Project\Path;

class ConfigPath extends ProjectPath
{

    protected function loadPath()
    {

        parent::loadPath();
        $this->addPath('config');

    }

}