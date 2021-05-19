<?php

namespace Hackathon;

use Hackathon\Setup\HackathonSetup;
use Hackathon\Web\HackathonWeb;
use Nemundo\Content\App\ContentAppProject;
use Nemundo\Core\Path\Path;
use Nemundo\Project\AbstractProject;
use Nemundo\Srf\SrfProject;

class HackathonProject extends AbstractProject
{
    public function loadProject()
    {
        $this->project = 'Hackathon';
        $this->projectName = 'hackathon';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = (new Path())
            ->addPath(__DIR__)
            ->addParentPath()
            ->addPath("model")
            ->getPath();

        $this->webLoadClass=HackathonWeb::class;
        $this->setupClass=HackathonSetup::class;

        $this->addDependency(new ContentAppProject());
        $this->addDependency(new SrfProject());


    }
}