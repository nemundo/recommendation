<?php

namespace Nemundo\Geo\Kml;

use Nemundo\Project\AbstractProject;

class KmlProject extends AbstractProject
{

    protected function loadProject()
    {

        $this->project = 'Kml';
        $this->projectName = 'kml';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;

    }

}