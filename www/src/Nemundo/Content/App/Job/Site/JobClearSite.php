<?php

namespace Nemundo\Content\App\Job\Site;

use Nemundo\Content\App\Job\Data\JobScheduler\JobSchedulerDelete;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Web\Site\AbstractSite;

class JobClearSite extends AbstractSite
{

    /**
     * @var JobClearSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Job Clear';
        $this->url = 'job-clear';
        $this->menuActive = false;

        JobClearSite::$site = $this;

    }

    public function loadContent()
    {

        $delete = new JobSchedulerDelete();
        $delete->filter->andEqual($delete->model->done, false);
        $delete->delete();

        (new UrlReferer())->redirect();

    }
}