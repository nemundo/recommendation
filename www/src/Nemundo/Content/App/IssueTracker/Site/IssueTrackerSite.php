<?php

namespace Nemundo\Content\App\IssueTracker\Site;

use Nemundo\Content\App\IssueTracker\Page\IssueTrackerPage;
use Nemundo\Web\Site\AbstractSite;

class IssueTrackerSite extends AbstractSite
{

    /**
     * @var IssueTrackerSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Issue Tracker';
        $this->url = 'issue-tracker';

        IssueTrackerSite::$site=$this;

    }

    public function loadContent()
    {
        (new IssueTrackerPage())->render();
    }
}