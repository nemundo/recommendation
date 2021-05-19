<?php

namespace Nemundo\App\Scheduler\Site;

use Nemundo\App\Scheduler\Page\JobPage;
use Nemundo\Web\Site\AbstractSite;

class JobSite extends AbstractSite
{

    /**
     * @var JobSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Job';
        $this->url = 'job';

        JobSite::$site = $this;

        new JobCleanSite($this);

    }

    public function loadContent()
    {
        (new JobPage())->render();
    }
}