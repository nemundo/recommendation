<?php

namespace Nemundo\App\Application\Site;

use Nemundo\App\Application\Page\ProjectPage;
use Nemundo\Web\Site\AbstractSite;

class ProjectSite extends AbstractSite
{

    /**
     * @var ProjectSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Project';
        $this->url = 'project';

        ProjectSite::$site=$this;

    }

    public function loadContent()
    {
        (new ProjectPage())->render();
    }
}