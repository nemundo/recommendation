<?php

namespace Nemundo\Content\App\Feed\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\Feed\Application\FeedApplication;
use Nemundo\Content\App\Feed\Content\Feed\FeedContentType;
use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Feed\Data\EnclosureType\EnclosureType;
use Nemundo\Content\App\Feed\Data\FeedModelCollection;
use Nemundo\Content\App\Feed\Job\FeedImportJob;
use Nemundo\Content\App\Feed\Scheduler\FeedImportScheduler;
use Nemundo\Content\App\Feed\Script\FeedCleanScript;
use Nemundo\Content\App\Job\Application\JobApplication;
use Nemundo\Content\App\Job\Setup\JobSetup;
use Nemundo\Content\App\Notification\Application\NotificationApplication;
use Nemundo\Content\App\Timeline\Application\TimelineApplication;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class FeedInstall extends AbstractInstall
{
    public function install()
    {

        (new JobApplication())->installApp();
        (new TimelineApplication())->installApp();
        (new NotificationApplication())->installApp();

        (new ApplicationSetup())
            ->addApplication(new FeedApplication());

        (new ModelCollectionSetup())
            ->addCollection(new FeedModelCollection());

        (new SchedulerSetup(new FeedApplication()))
            ->addScheduler(new FeedImportScheduler());

        (new ScriptSetup())
            ->addScript(new FeedCleanScript());

        (new ContentTypeSetup(new FeedApplication()))
            ->addContentType(new FeedContentType())
            ->addContentType(new FeedItemContentType());

        (new JobSetup(new FeedApplication()))
            ->addJob(new FeedImportJob());


        $this->addEnclosureType('audio');
        $this->addEnclosureType('video');


    }


    private function addEnclosureType($enclosureType)
    {

        $data = new EnclosureType();
        $data->ignoreIfExists = true;
        $data->eenclosureType = $enclosureType;
        $data->save();

    }


}