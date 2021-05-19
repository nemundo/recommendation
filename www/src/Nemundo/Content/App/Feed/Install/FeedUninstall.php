<?php


namespace Nemundo\Content\App\Feed\Install;


use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\Explorer\Setup\ExplorerSetup;
use Nemundo\Content\App\Feed\Application\FeedApplication;
use Nemundo\Content\App\Feed\Content\Feed\FeedContentType;
use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Feed\Data\FeedModelCollection;
use Nemundo\Content\App\Feed\Job\FeedImportJob;
use Nemundo\Content\App\Feed\Scheduler\FeedImportScheduler;
use Nemundo\Content\App\Feed\Script\FeedCleanScript;
use Nemundo\Content\App\Job\Setup\JobSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class FeedUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new FeedCleanScript())->run();


        (new SchedulerSetup())
            ->removeScheduler(new FeedImportScheduler());

        (new ScriptSetup())
            ->removeScript(new FeedCleanScript());

        (new ContentTypeSetup(new FeedApplication()))
            ->removeContentType(new FeedContentType())
            ->removeContentType(new FeedItemContentType());

        (new JobSetup(new FeedApplication()))
            ->removeContentType(new FeedImportJob());

        (new ExplorerSetup())
            ->removeContentType(new FeedContentType())
            ->removeContentType(new FeedItemContentType());

        (new ModelCollectionSetup())
            ->removeCollection(new FeedModelCollection());


        /*
        (new ApplicationSetup())
            ->removeApplication(new FeedApplication());*/


    }

}