<?php

namespace Nemundo\Content\App\IssueTracker\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\IssueTracker\Application\IssueTrackerApplication;
use Nemundo\Content\App\IssueTracker\Content\Cancel\CancelContentType;
use Nemundo\Content\App\IssueTracker\Content\Issue\IssueProcess;
use Nemundo\Content\App\IssueTracker\Content\IssueTracker\IssueTrackerContentType;
use Nemundo\Content\App\IssueTracker\Content\Priority\PriorityContentType;
use Nemundo\Content\App\IssueTracker\Content\Solved\SolvedContentType;
use Nemundo\Content\App\IssueTracker\Data\IssueTrackerModelCollection;
use Nemundo\Content\App\Task\Application\TaskApplication;
use Nemundo\Content\App\Task\Install\TaskInstall;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class IssueTrackerUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ContentTypeSetup(new IssueTrackerApplication()))
            ->removeContentType(new IssueTrackerContentType())
            ->removeContentType(new PriorityContentType())
            ->removeContentType(new IssueProcess())
            ->removeContentType(new SolvedContentType())
            ->removeContentType(new CancelContentType());

        (new ModelCollectionSetup())
            ->removeCollection(new IssueTrackerModelCollection());
        

    }
}