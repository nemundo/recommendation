<?php

namespace Nemundo\Content\App\Job\Site;

use Nemundo\Content\App\Job\Page\JobPage;
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

        JobSite::$site=$this;

        new JobNewSite($this);
        new JobClearSite($this);

    }

    public function loadContent()
    {
        (new JobPage())->render();
    }
}