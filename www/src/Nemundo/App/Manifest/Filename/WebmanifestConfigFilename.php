<?php


namespace Nemundo\App\Manifest\Filename;


use Nemundo\Project\Path\ConfigPath;

class WebmanifestConfigFilename extends ConfigPath
{

    protected function loadPath()
    {

        parent::loadPath();
        $this->addPath('webmanifest.json');

    }

}