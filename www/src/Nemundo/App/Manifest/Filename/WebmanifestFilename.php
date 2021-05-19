<?php


namespace Nemundo\App\Manifest\Filename;


use Nemundo\Project\Path\WebPath;

class WebmanifestFilename extends WebPath
{

    protected function loadPath()
    {

        parent::loadPath();
        $this->addPath('manifest.webmanifest');

    }

}