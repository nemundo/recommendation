<?php

namespace Nemundo\Content\App\Job\Site;

use Nemundo\Content\App\Job\Page\JobNewPage;
use Nemundo\Web\Site\AbstractSite;

class JobNewSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'New';
        $this->url = 'job-new';
    }

    public function loadContent()
    {
        (new JobNewPage())->render();
    }
}